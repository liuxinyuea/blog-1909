<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016101900720831",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEAi0GI1CVU59fi3XMdfrLdmUnthVPEOE7Y0mHC/ZWEIClXRRjg6qeS2GARaxuJeKklk+V3NYxbYCA+HqosKXEsyCZHlRRD0+MtoInPpf+oGufDstalcxJamWzndHJizHyQwaCBh7l8yYcjcv/W6zlpY9LNDWKh67KiSvkmC17pgfGO67aPuZ5PsvjBPK925xKQI9QN9EF3h4p2M0NmKRtKdOfI1q1zfGaDmJ6iaKVm2M2MOXZjmn2LlxGTb7zdqN/iMeQLp7V/6HXOsP5LSTyWg+wiPt/sSfWQFP4ZFHUK1p5xSASbNhN7BeyYJvvc1wBlaa9x9CiCC/+4gmLs0hGP+wIDAQABAoIBACQSRa8uPGARu+JA/1LiYiRi0fPHTvyG8AMO78NgB2mNS93KI/ikj5UczWZBK8rlhaZZuhdU1BaCQ5UN34Kcnkz6HXCwXyFzp03+ZJtLLfBKOJcKorC8AFvdqdawCoeNfLGrMeJGWdyZ9MTFIJatuG7zG8pr0iWLkB57iy9G1pWh6U14Jj9mEg4ZVXnM1Ev5vDJajrO0MzYLVGai+sHqnts5qQDDWGPFPJ2szv5qHf0NfQh/jJ/EXz28uj5Zn0p0EZulWJGfAQf50Q3XhnvxcAdIlLFreXwGPiDxrzMTdVUXG/FN14E6VjtnSn5y2Ui/N8n14MlEM8jC7j6yA7Pyz4ECgYEA4fXbIctQSf7SPf+gY+C6X3HfZO6ym5yZFJvgCrziX1gp87GsqeMVR02VWg2H3pwOzaNrgcWxPYrXjbAPn3jnGHY0Q/XaxeZ7S0g0IQuN0vUOgdIkboIBGV9FGdNvGDWF4B3OcMhJ7/Jbhv/0GZMA1ynM+xJN9ULMSSv9QXSGqo8CgYEAncTa5AuOLmrezEy1GtqzwQpnfpUTs3gdYNZ+Hk37I3vrXwAkW/McJc9bnCcaNV6Xvvp3n30yn5G3Xl+WmRbT7mmLw/hvjraI+YWdOKphnU3UwokzfDhleMXkLzKBmTnhigp0xCOvnRYET47SUqdHNVHGUEpA5d1eCUAx/7lfadUCgYEA2fqI2IMAA0H1o6WUHoXOhQCfFwlF9+QLsNvmN7WbU4sDfXlrLcBI6K4pY+QlrFQz26DItzn1D39/DcpIZ/kERo7RQLZNxBfh3O/cifxRZq7MvePxDUIQuV80lANp6prHeTqHyjkNSpIsRYFpA7rSVr6WZaZ02iMEW5o6CAjXWHUCgYAZB2rmdMLYsFGqPZ0ZpoqP3HOwzDu05CBdBYo6ioqGBZnAl4gtIjNb+DqDWly5DMmsHZYusjD+yaI6kZWVsd5rW0k2DMq97E1ssHrRy43y468WMaf+VAAdGd/qcOvIgDs8qA4AM90fYafLa1AIlssgNVnt0OnczbKmaw3DkQgHBQKBgQCjsDJRGRkpIj6nEdSyaLH9rTeinesJtfo74QYbK1tf19PyvyruYUbjCz0jP9xWXSPug1rmdbyZX6t0eG3R+gDD1mXI8kitUDgwh32jrSr2OczDGj0dAbVeGXb+3B+EiQdcxY3um8RxRViAS0GLNzcIksUW1dZoRkHMGPOr/+wrug==",
		
		//异步通知地址
		'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://localhost/alipay/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAv8Y9XFrqjzcVMfXpcX3HVaqg1hlqQDUvhTRVbUHi2pGOEZaJlhzK2p8iOU0idxNZz1Ud79J2TK+TrM/ilci1WXwcydpB3SgxYODO03z1PxA/KLvBEzwUOdUholUsCTJ06Efax8W3TCMhi2qiReQM7zjMR1DkIU9xfa6bDseZKLCMrcN12RdT9J6AHHHV/FMUYul5NHXk0HtM+Vh5CFc4o9+qS5ws1rtpvMGSWdtWAaUi1lVxnLdBOG4lOkiYYlN5fpq4MfB10dWpEXZRFMCYPlK3zIuwoIOY5wBydrn9C31Z8/n5hYFgSXVGqxvpjzhLPbGU6o+jrQnC1V251Sw+QQIDAQAB",
		
	
);