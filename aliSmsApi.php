//ali sms api demo
//https://next.api.aliyun.com/api/Dysmsapi/2017-05-25/SendSms?params=
//https://github.com/aliyun/openapi-sdk-php

require __DIR__ . '/vendor/autoload.php';
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use AlibabaCloud\Dysmsapi\Dysmsapi;
AlibabaCloud::accessKeyClient('<your-access-key-id>', '<your-access-key-secret>')
	->regionId('cn-hangzhou')
	->asDefaultClient();
$d=new Dysmsapi();
try {
	$request = $d::v20170525()->sendSms();
	$result = $request
		->withPhoneNumbers("XXX")
		->withSignName("XXX")
		->withTemplateCode("SMS_000000000")
		->withTemplateParam("{\"code\":\"666666\"}")
		->debug(true) // Enable the debug will output detailed information
		->connectTimeout(1) // Throw an exception when Connection timeout
		->timeout(1) // Throw an exception when timeout 
		->request();
	print_r($result->toArray());
} catch (ClientException $exception) {
	echo $exception->getMessage() . PHP_EOL;
} catch (ServerException $exception) {
	echo $exception->getMessage() . PHP_EOL;
	echo $exception->getErrorCode() . PHP_EOL;
	echo $exception->getRequestId() . PHP_EOL;
	echo $exception->getErrorMessage() . PHP_EOL;
}

/*
result:
[RequestId] => A1A2A3DD-123A-12A3-A123-123456789012
[Message] => OK
[BizId] => 123456789012345678^0
[Code] => OK

[problem1] 
Fatal error: Uncaught Error: Call to undefined function Dysmsapi()
change 
  Dysmsapi()::v20170525()->sendSms();
to
$d=new Dysmsapi();
$d::v20170525()->sendSms();

[problem2] RequestParameterMalformed
RequestParameterMalformed
SDK.UnknownError: <?xml version='1.0' encoding='UTF-8'?><Error><RequestId>******</RequestId><HostId>dysmsapi.aliyuncs.com</HostId><Code>RequestParameterMalformed</Code><Message>Request parameters has malformed encoded characters.</Message><Recommend><![CDATA[https://error-center.aliyun.com/status/search?Keyword=RequestParameterMalformed&source=PopGw]]></Recommend></Error> RequestId:  POST "http://dysmsapi.aliyuncs.com" 400
SDK.UnknownError
use utf8 file for withSignName can be unicode
*/
