$json = Json::fromArray(array('response' => $users));
echo $json->asJSON();