<?php

class Session
{
    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_set_cookie_params([
                'lifetime' => 0,
                //'secure' => true,
                'httponly' => true,
                'samesite' => 'Strict' // hjälper mot CSRF attacker
            ]);
            session_start();
            session_regenerate_id(true);
            // skapa ny id på sessionen efter 30 minuter
            if (!isset($_SESSION['CREATED'])) {
                $_SESSION['CREATED'] = time();
            } elseif (time() - $_SESSION['CREATED'] > 1800) { // 15 minutes
                session_regenerate_id(true);
                $_SESSION['CREATED'] = time();
            }

            if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
                self::destroy(); // ifall man är inaktiv i 30 minuter förstör vi sessionen
                header('Location: /auth'); // Tillbaka till login
                exit;
            }
            // Om användaren är aktiv förnyas sessionen
            $_SESSION['LAST_ACTIVITY'] = time();
        }
    }
    public static function set($key, $value)
    {
        self::start();
        $_SESSION[$key] = $value;
    }
    public static function get($key)
    {
        self::start();
        return $_SESSION[$key] ?? null;
    }

    public static function exists($key)
    {
        self::start();
        return isset($_SESSION[$key]);
    }
    public static function remove($key)
    {
        self::start();
        if (self::exists($key)) {
            unset($_SESSION[$key]);
        }
    }
    public static function destroy()
    {
        self::start();
        session_unset();
        session_destroy();
    }
}
