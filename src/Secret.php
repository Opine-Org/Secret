<?php
/**
 * Opine\Secret
 *
 * Copyright (c)2013, 2014 Ryan Mahoney, https://github.com/Opine-Org <ryan@virtuecenter.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
namespace Opine;

class Secret {
	public function __construct ($config) {
        $this->salt = $config->auth['salt'];
    }

    public function encrpyt ($string) {
        return $this->encryptDecrypt('encrpyt', $string);
    }

    public function decrypt ($string) {
        return $this->encryptDecrypt('decrypt', $string);
    }

    private function encryptDecrypt($action, $string) {
        $output = false;
        $iv = md5(md5($this->salt));
        if ($action == 'encrypt') {
            return urlencode(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($this->salt), $string, MCRYPT_MODE_CBC, $iv)));
        } else if ($action == 'decrypt') {
            return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($this->salt), base64_decode(urldecode($string)), MCRYPT_MODE_CBC, $iv));
        }
        return false;
    }
}