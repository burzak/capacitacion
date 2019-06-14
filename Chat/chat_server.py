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


class ChatServer(threading.Thread):
    def __init__(self, channel):
        super().__init__()
        self.users = []
        self.channel = channel
        

    def callback(self, ch, method, properties, body):
        if body[:3] == b'[0]':
            self.users.append(body[4:].decode("utf-8"))
            return
        print(body)
        print(self.users)
        for user in self.users:
            print(user)
            self.channel.basic_publish(exchange='', routing_key=user, body=body.decode("utf-8"))

    def run(self):
        self.channel.queue_declare('mensajes')
        self.channel.basic_consume(
            queue='mensajes', on_message_callback=self.callback, auto_ack=True)

        print(' [*] Waiting for messages. To exit press CTRL+C')
        self.channel.start_consuming()



if __name__ == "__main__":
    parser = argparse.ArgumentParser(description='Chat usando Rabbitmq')

    parser.add_argument('-u', '--user', default='guest', help='user para logearse a rabbitmq')
    parser.add_argument('-pwd', '--password', default='guest', help='password para logear a rabbitmq')
    parser.add_argument('-host', '--host', help='ip del server rabbitmq')
    parser.add_argument('-p', '--port', default=10001, type=int, help='puerto del server rabbitmq')
    parser.add_argument('-s', '--server', type=bool, help='definir si vamos a hacer el trabajo del server')
    args = parser.parse_args()

    
    credentials = pika.PlainCredentials(args.user, args.password)
    parameters = pika.ConnectionParameters(args.host, args.port, '/', credentials)
    connection = pika.BlockingConnection(parameters)

    channel = connection.channel()
    channel.queue_declare('mensajes')

    server = ChatServer(channel)
    server.start()