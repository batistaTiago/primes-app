docker stop locust
docker rm locust
docker run --name locust -p 8089:8089 -v $PWD:/mnt/locust -w /mnt/locust locustio/locust -f /mnt/locust/locustfile.py