#!/usr/bin/python
"""
Chat:

- docker pull rabbitmq:management
- docker create -it -p 10000:15672 -p 10001:5672 --name michat rabbitmq:management
- docker start michat

- pip install pika
"""
import argparse
import sys

import threading
import pika
import time


class Chat(threading.Thread):
    def __init__(self, channel, username):
        self.channel = channel

        self.username = username
        self.id = '{}'.format(time.time())

    def mandar_mensaje(self, str):
        msg = "[{}] {}".format(self.username, str)
        self.channel.basic_publish(exchange='', routing_key='mensajes', body=msg)

    def darme_de_alta(self):
        msg = "[0] {}".format(self.id)
        self.channel.basic_publish(exchange='', routing_key='mensajes', body=msg)        

    def callback(self, ch, method, properties, body):
        print("{}".format(body))

    def run(self):
        self.channel.queue_declare(queue=self.id)
        self.channel.basic_consume(
            queue=self.id, on_message_callback=self.callback, auto_ack=True)

        print(' [*] Esperando mensajes. Para salir CTRL+C')
        self.channel.start_consuming()
        



if __name__ == "__main__":
    parser = argparse.ArgumentParser(description='Chat usando Rabbitmq')

    parser.add_argument('-u', '--user', default='guest', help='user para logearse a rabbitmq')
    parser.add_argument('-pwd', '--password', default='guest', help='password para logear a rabbitmq')
    parser.add_argument('-host', '--host', default='localhost', help='ip del server rabbitmq')
    parser.add_argument('-p', '--port', default=10001, type=int, help='puerto del server rabbitmq')
    parser.add_argument('-s', '--server', type=bool, help='definir si vamos a hacer el trabajo del server')
    args = parser.parse_args()

    
    credentials = pika.PlainCredentials(args.user, args.password)
    parameters = pika.ConnectionParameters(args.host, args.port, '/', credentials)
    connection = pika.BlockingConnection(parameters)

    channel = connection.channel()
    channel.queue_declare('mensajes')
    channel.basic_publish(exchange='', routing_key='mensajes', body='holu')

    name = input("Tu usuario: ")

    chat = Chat(channel, name)
    chat.darme_de_alta()

    while True:
        mensaje = input("Mensaje: ")
        chat.mandar_mensaje(mensaje)