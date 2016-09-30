# Configuration
**Php** php.ini
```sh
expose_php = Off
log_errors = On
display_errors = Off
session.cookie_httponly = 0 (XSS)
session.use_only_cookies = 0
session.cookie_secure = 0
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
