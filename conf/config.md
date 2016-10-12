# Configuration
**Php** php.ini
```sh
expose_php = Off
log_errors = On
display_errors = Off
session.cookie_httponly = 1 
session.cookie_secure = 1
```

**Apache**
httpd.conf
```sh
TraceRoute = Off
ServerToken = Prod
Include /path-to-apache-extra-conf/httpd-ssl.conf
```
