* Deploy in k8s
  * docker build . -t ekyidag/primes:v3 -f Dockerfile
  * docker push ekyidag/primes:v3
  * kubectl apply -f ./deploy/primes-app.yaml

* Comandos uteis
  * (restart a deployment) kubectl rollout restart deployments/{name}
  * (get all logs from deployment) kubectl logs -f deployment/{name}


`COMMIT_TAG=$(git rev-parse --short HEAD); docker build . -t ekyidag/primes:$COMMIT_TAG -f Dockerfile; docker push ekyidag/primes:$COMMIT_TAG; kubectl apply -f ./deploy/primes-app.yaml`