import time, uuid, json
import random
from locust import HttpUser, TaskSet, task, between

class AuthenticatedUser(HttpUser):
    wait_time = between(1, 2.5)
    host = 'http://192.168.59.100:30101'

    @task
    def sample_task(self):
        BASE_LINE = 2500
        number = random.randint(0, 1000) + BASE_LINE
        response = self.client.get('/' + str(number))
        if (response.status_code != 200):
            print response.text