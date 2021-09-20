## PHP WEB FRAMEWORK PERFORMANCE BENCHMARK

- hyperf
- laravel-octane-swoole
- laravel-php-fpm
- simps
- swoft

### Performance tested on
```
CloudProvider = AWS
Instance type = c5n.xlarge
Number of vCPUs = 4
```

### Results
```
ubuntu@ip-172-31-28-119:~/php-web-framework-benchmark/hyperf$ wrk -t2 -c20 -d30s http://127.0.0.1:8080/api/healthz
Running 30s test @ http://127.0.0.1:8080/api/healthz
  2 threads and 20 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency     1.17ms    0.85ms  31.91ms   92.52%
    Req/Sec     9.10k   576.27    17.50k    81.03%
  544360 requests in 30.10s, 92.41MB read
Requests/sec:  18085.07
Transfer/sec:      3.07MB

ubuntu@ip-172-31-28-119:~/php-web-framework-benchmark/hyperf$ wrk -t2 -c20 -d30s http://127.0.0.1:8080/api/user/2
Running 30s test @ http://127.0.0.1:8080/api/user/2
  2 threads and 20 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency     5.51ms    2.25ms  38.72ms   76.63%
    Req/Sec     1.85k    84.92     2.17k    71.67%
  110368 requests in 30.01s, 21.58MB read
Requests/sec:   3678.14
Transfer/sec:    736.35KB

===

ubuntu@ip-172-31-28-119:~/php-web-framework-benchmark/laravel-octane-swoole$ wrk -t2 -c20 -d30s http://127.0.0.1:8080/api/healthz
Running 30s test @ http://127.0.0.1:8080/api/healthz
  2 threads and 20 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency     8.60ms   10.06ms 171.93ms   91.50%
    Req/Sec     1.54k   136.11     1.89k    65.50%
  91812 requests in 30.01s, 22.68MB read
Requests/sec:   3059.30
Transfer/sec:    773.80KB

ubuntu@ip-172-31-28-119:~/php-web-framework-benchmark/laravel-octane-swoole$ wrk -t2 -c20 -d30s http://127.0.0.1:8080/api/user/2
Running 30s test @ http://127.0.0.1:8080/api/user/2
  2 threads and 20 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency    10.92ms    7.26ms  71.18ms   93.38%
    Req/Sec     1.02k    98.73     1.23k    64.83%
  60819 requests in 30.01s, 16.65MB read
Requests/sec:   2026.67
Transfer/sec:    568.03KB

===

ubuntu@ip-172-31-28-119:~/php-web-framework-benchmark/laravel-php-fpm$ wrk -t2 -c20 -d30s http://127.0.0.1:8080/api/healthz
Running 30s test @ http://127.0.0.1:8080/api/healthz
  2 threads and 20 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency    18.64ms    0.88ms  28.30ms   72.94%
    Req/Sec   538.58     13.97   575.00     69.83%
  32184 requests in 30.02s, 7.55MB read
Requests/sec:   1072.07
Transfer/sec:    257.55KB

ubuntu@ip-172-31-28-119:~/php-web-framework-benchmark/laravel-php-fpm$ wrk -t2 -c20 -d30s http://127.0.0.1:8080/api/user/2
Running 30s test @ http://127.0.0.1:8080/api/user/2
  2 threads and 20 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency    41.37ms    8.77ms  69.92ms   71.87%
    Req/Sec   242.51     47.28   313.00     51.33%
  14504 requests in 30.02s, 3.79MB read
Requests/sec:    483.11
Transfer/sec:    129.27KB

===

ubuntu@ip-172-31-28-119:~/php-web-framework-benchmark/simps$ wrk -t2 -c20 -d30s http://127.0.0.1:8080/api/healthz
Running 30s test @ http://127.0.0.1:8080/api/healthz
  2 threads and 20 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency   812.17us  415.49us  20.34ms   81.28%
    Req/Sec    12.61k   790.51    24.72k    82.70%
  753637 requests in 30.10s, 125.78MB read
Requests/sec:  25038.34
Transfer/sec:      4.18MB

ubuntu@ip-172-31-28-119:~/php-web-framework-benchmark/simps$ wrk -t2 -c20 -d30s http://127.0.0.1:8080/api/user/2
Running 30s test @ http://127.0.0.1:8080/api/user/2
  2 threads and 20 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency     2.41ms    1.13ms  26.35ms   75.62%
    Req/Sec     4.25k   182.95     4.89k    73.83%
  253540 requests in 30.00s, 48.84MB read
Requests/sec:   8451.15
Transfer/sec:      1.63MB

===

ubuntu@ip-172-31-28-119:~/php-web-framework-benchmark/swoft$ wrk -t2 -c20 -d30s http://127.0.0.1:8080/api/healthz
Running 30s test @ http://127.0.0.1:8080/api/healthz
  2 threads and 20 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency     1.54ms    1.24ms  26.50ms   93.25%
    Req/Sec     7.16k   592.24     8.67k    66.50%
  427443 requests in 30.00s, 77.45MB read
Requests/sec:  14247.91
Transfer/sec:      2.58MB

ubuntu@ip-172-31-28-119:~/php-web-framework-benchmark/swoft$ wrk -t2 -c20 -d30s http://127.0.0.1:8080/api/user/2
Running 30s test @ http://127.0.0.1:8080/api/user/2
  2 threads and 20 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency     4.59ms    2.62ms  40.09ms   84.59%
    Req/Sec     2.29k   141.11     2.69k    67.50%
  136934 requests in 30.00s, 28.34MB read
Requests/sec:   4564.08
Transfer/sec:      0.94MB
```
