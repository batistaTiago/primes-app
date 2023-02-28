const express = require('express');
const app = express();

const isPrime = (num) => {
    if (num <= 1) return false;
    for (let i = 2; i < num - 1; i++) {
        if (num % i === 0) {
            return false;
        }
    }

    return true;
}

const log = (msg) => {
    const date = new Date();
    console.log(`[${date.toLocaleDateString()} ${date.toLocaleTimeString()}] ${msg}`);
}

app.get('/:count', async (req, res) => {
    log('Handling request...');

    const requestDateTime = new Date();
    const input = Number(req.params.count);
    const startTimestamp = requestDateTime.getTime();
    
    let elapsedTime = null;

    let primes = [];
    let n = 0;

    while (primes.length < input) {
        if (isPrime(n)) {
            primes.push(n);
        }

        n++;
    }

    elapsedTime = new Date().getTime() - startTimestamp;

    log(`${input} prime calculated in ${elapsedTime} ms.`);
    
    res.json({ input, elapsedTime });
});

app.listen(3000, () => {
    log(`Server runnning...`);
});
