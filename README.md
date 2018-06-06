# BitHash
## Version 2.0 (PHP)
This version has been built in PHP. I have also changed the hashing method used to implement bcrypt. The entire point to BitHash is that it's a unique hashing method and when implementing bcrypt I wanted to keep it unique. Most hash cracking tools support the cracking of   `bcrypt($pass)` and some support `bcrypt(md5($pass))` or `bcrypt(sha1($pass))` and likewise methods. We have decided to differ from this by truncating our input to bcrypt and also appending a prefix to it.

## Requirements
PHP >5.3.7
## Algorithm
The algorithm used for BitHash is like so:
```
bcrypt(truncate(md5($pass)))
```
And the algorithm used for generating the `truncate()` is simple grabbing pieces of the MD5 hash and mixing it together. After which it is then giving the prefix of `$Bh$` before being placed into the `bcrypt()` function.

## Verification Function
This function is really simple. It takes 2 inputs, the plaintext password along with the hash to be checked. After which, it puts the plaintext password through the same function minus the `bcrypt()` step, which would be the following:
```
truncate(md5($pass))
```
After which, it is put into the PHP function `password_verify` and the result is returned. This function normally accepts a plaintext password and a bcrypt hash and verifies whether they match or not. Instead, it will now accept a truncated, MD5 hashed password and a bithash hash and verifies whether they match or not, and this function can be called using `bithash_verify`.

## Version 1.0 (Javascript/HTML)
Unique hashing method for security built in javascript. The method can be easily transferred into PHP or other server-side languages. Ideal for storing unique hashes into a database. BitHash requires some tweaking to be utilized, such as storing the passwords into a MySQL database and adding it to login/registration pages. If you have a website which is already using a different hashing method, you'll need to send an email to all users telling them their passwords have been reset, and then resetting their passwords to a random string and including it in the email sent out. All those strings must be encrypted via BitHash for the move.
