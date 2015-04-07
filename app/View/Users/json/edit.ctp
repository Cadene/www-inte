$json = Json::fromArray(array('response' => $user));
echo $json->asJSON();