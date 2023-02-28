import time, uuid, json
import random
from locust import HttpUser, TaskSet, task, between

class AuthenticatedUser(HttpUser):
    wait_time = between(1, 2.5)

    @task
    def sample_task_node(self):
        BASE_LINE = 500
        number = random.randint(0, 1000) + BASE_LINE
        print('sending request to node serve...')
        response = self.client.get('http://192.168.59.100:30101/' + str(number), name='Node')
        if (response.status_code == 200):
            print('ok...')
        else:
            print('error...')

    @task
    def sample_task_php(self):
        BASE_LINE = 500
        number = random.randint(0, 1000) + BASE_LINE
        print('sending request to php server...')
        response = self.client.get('http://192.168.59.100:30102/?count=' + str(number), name='Php')
        if (response.status_code == 200):
            print('ok...')
        else:
            print('error...')

