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
* Exemplo de como subir app (k8s: versao laravel) no deploy local
  * `COMMIT_TAG=dev; docker build . -t ekyidag/primes-app-laravel:$COMMIT_TAG -f ./laravel-version/Dockerfile; docker push ekyidag/primes-app-laravel:$COMMIT_TAG; kubectl delete deployments --all; kubectl apply -f deploy/primes-app-laravel.yaml`