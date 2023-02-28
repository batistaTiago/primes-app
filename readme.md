* Building images
  * node version
    * COMMIT_TAG=$(git rev-parse --short HEAD); 
    * docker build . -t ekyidag/primes-app-node:$COMMIT_TAG -f ./node-version/Dockerfile
    * docker push ekyidag/primes-app-node:$COMMIT_TAG
      * deploy in k8s: kubectl apply -f deploy/primes-app-node.yaml
  * php version
    * COMMIT_TAG=$(git rev-parse --short HEAD); 
    * docker build . -t ekyidag/primes-app-php:$COMMIT_TAG -f ./php-version/Dockerfile
    * docker push ekyidag/primes-app-php:$COMMIT_TAG
      * deploy in k8s: kubectl apply -f deploy/primes-app-php.yaml
  * laravel version
    * COMMIT_TAG=$(git rev-parse --short HEAD); 
    * docker build . -t ekyidag/primes-app-laravel:$COMMIT_TAG -f ./laravel-version/Dockerfile
    * docker push ekyidag/primes-app-laravel:$COMMIT_TAG
      * deploy in k8s: kubectl apply -f deploy/primes-app-laravel.yaml
* Comandos uteis
  * (restart a deployment) kubectl rollout restart deployments/{name}
  * (get all logs from deployment) kubectl logs -f deployment/{name}
  * Exemplo de como subir app no k8s:
```
  VERSION=node && \
  COMMIT_TAG=$(git rev-parse --short HEAD) && \
  docker build . -t ekyidag/primes-app-$VERSION:$COMMIT_TAG -f ./$VERSION-version/Dockerfile && \
  docker push ekyidag/primes-app-$VERSION:$COMMIT_TAG && \
  kubectl delete deployment primes-app-$VERSION; \
  kubectl apply -f deploy/primes-app-$VERSION.yaml
```