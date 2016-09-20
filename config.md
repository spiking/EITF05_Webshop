# Configuration
**Php** php.ini
```sh
expose_php = Off
log_errors = On
display_errors = Off
session.cookie_httponly = 1 (XSS)
```

**Apache**
httpd.conf
```sh
TraceRoute = Off
```