package es.malaga.diputacion.ae.help.controller.auth;

/*
 *Con OPenSSL se Genera la clave privado con
 *  C:/OpenSSL/bin/openssl genrsa -aes128 -out key.pem 2048
 *  Y se genera en /bin/clave.PEM
 *La clave publica con
 *  openssl rsa -in key.pem -pubout -out key.public.pem 
 *  Y se genera en /bin/key.public
 */
public class JwtConfig {
	public static final String LLAVE_SECRETA = "alguna.clave.secreta.12345678";

	public static final String RSA_PRIVADA = "-----BEGIN RSA PRIVATE KEY-----\r\n"
			+ "MIIEogIBAAKCAQEAs+nQysKOBwrJpP6GdqHKFx2zzwpVFNp4cWxpyPn9T7/qfu1t\r\n"
			+ "X2JZMKu5ne3sqbYj/9yb25XLetUzPXTq6GBHsPfvK74U5h456gWF+ksgfqFhhDVc\r\n"
			+ "umLhLZOxPHOnLibmK9EfCuBghhl0zEESqAt4h4BLVzk3j1YspvufKsEW116aTuUh\r\n"
			+ "RZ5YNhqQl9lYH6jw/ENbho86a0wlBWSSvko8R4egDsfcMI6gCMzIhB7sADnzP8H0\r\n"
			+ "i1iQ9NGNthQl46ruQDGvNShv5MwaxV309wOJpoXQDM0vUs41t0Zl1Y1r1ZABBdwN\r\n"
			+ "gUdH+hcomGhqTcQPOApjiJZ78vFzBE+kCLnDjwIDAQABAoIBAFkOv6zum5F+1IwY\r\n"
			+ "9gSZV8kTieNN0QnujzpOGRtELBEjBffonYBe1ZmTF+HGWaU0pSNNV9VdlAjsql2c\r\n"
			+ "l3+J0VMXl8vGXt/+TFq8ezKHp8EnL3dbVthog+CkwFIVScc9uCgubzhaE02uIjPN\r\n"
			+ "bmfCrdodNq4pg4gvdxD9cy+dvynCNRYDwRsWbmMgKnfbBPC6tHFf2x7d32aILvTw\r\n"
			+ "PxpieLmnG6ReVj/U2XiWV1HcKQfBJZhaQc5WM4dIa+2wksU2jZ9Oe0eLjeICDMP8\r\n"
			+ "kDIQgk2VUQSkVVLrEczqJJP0pFS5JKy4Efxln8GKR9VN60ar71zd1bsOqPEHMwKa\r\n"
			+ "LCh3WfECgYEA1rmy0DcQE9zt7SqBDhH+IWJZKpGN+lSTq/3LDakH/ss47YZ9V3Rn\r\n"
			+ "gBs89a2RyqpofbdTIPs1q6vPJ5X7TljFJBP3/MCj59PQZ9adJUnNdhE+mZmB4Tw2\r\n"
			+ "uNeLy8RtxO96bSE/TvLLvceCN+gscg1r63t2mxyxg/XVOpEDNCMaMqkCgYEA1n8S\r\n"
			+ "HIq2X9xYoqNJHbLbh7gewkLD6t4y6Nb+8hyHqqDieXeNzWNsP+poI6SUgmf5fRjB\r\n"
			+ "00g7L5vqTCF3VgZyxq2T8dZi40LVLv2cG4vHQb0BdxByEzOm8Oo1fQS3hEryTPm3\r\n"
			+ "KqWvmOHEaTb4rS1fP9S/IfjiX1vP31QEJ7fz33cCgYAed5zipF14pAlydGx5ZZ4s\r\n"
			+ "eHr0alC961BEwC8WkhxbT9SVB1czmIWzDKpapbUhD4riA6gc7ugPosIy+Ln+xOO8\r\n"
			+ "GcU/LMpU854HjdEgYFdx4EKEot5l6hhNo+/nCskUf3Jcl7IW7qZwGCXm7t+Xk0Xz\r\n"
			+ "1MHggnLBqZkGxVqyBCUMeQKBgE9z+m2AJFYV9O8ptOe/XPpFBX/H43KYpBsDqKRe\r\n"
			+ "VRKrTbjYxDoUXgC+/5xUVn6HrS7dgM6WrvXPt1ZD/0RqVxGpMmgelbrBAt7JKo45\r\n"
			+ "lLGRJX3JJbhfJbOPzghlOuVSLba9uU+e2BC1cF/Y8PyVFfc7AyG+Y3wXMkTzhiaA\r\n"
			+ "SWG5AoGAXd7XIVdMB34niEJaaYhwXIjMSPWHnk6orY9QR4SU0fdfDDGgWCT/Wgc0\r\n"
			+ "oEQD3xqGgFOiSygR6kQft1B/ddBZwDOZexA2bIBd3whjgL3sKp21AGUh8f9xJdhN\r\n"
			+ "nbPn3qUOjE+yklucUjr4N4FDtEPquiCR6iFRtr656a+cXrcJxXU=\r\n" + "-----END RSA PRIVATE KEY-----";

	public static final String RSA_PUBLICA = "-----BEGIN PUBLIC KEY-----\r\n"
			+ "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAs+nQysKOBwrJpP6GdqHK\r\n"
			+ "Fx2zzwpVFNp4cWxpyPn9T7/qfu1tX2JZMKu5ne3sqbYj/9yb25XLetUzPXTq6GBH\r\n"
			+ "sPfvK74U5h456gWF+ksgfqFhhDVcumLhLZOxPHOnLibmK9EfCuBghhl0zEESqAt4\r\n"
			+ "h4BLVzk3j1YspvufKsEW116aTuUhRZ5YNhqQl9lYH6jw/ENbho86a0wlBWSSvko8\r\n"
			+ "R4egDsfcMI6gCMzIhB7sADnzP8H0i1iQ9NGNthQl46ruQDGvNShv5MwaxV309wOJ\r\n"
			+ "poXQDM0vUs41t0Zl1Y1r1ZABBdwNgUdH+hcomGhqTcQPOApjiJZ78vFzBE+kCLnD\r\n" + "jwIDAQAB\r\n"
			+ "-----END PUBLIC KEY-----";

}
