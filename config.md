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
Deny, Allow
```

# Breached Branch
**Apache**
httpd.conf
```sh
Header always set X-Xss-Protection: 0
```
