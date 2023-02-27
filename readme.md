* Deploy in k8s
  * docker build . -t ekyidag/primes:v3 -f Dockerfile
  * docker push ekyidag/primes:v3
  * kubectl apply -f .\deploy\primes-app.yaml
  * kubectl apply -f .\deploy\primes-service.yaml


`COMMIT_TAG=$(git rev-parse --short HEAD); docker build . -t ekyidag/primes:$COMMIT_TAG -f Dockerfile; docker push ekyidag/primes:$COMMIT_TAG; kubectl apply -f .\deploy\primes-app.yaml; kubectl apply -f .\deploy\primes-service.yaml`