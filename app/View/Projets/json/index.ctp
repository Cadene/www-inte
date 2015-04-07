$json = Json::fromArray(array('response' => $projets));
echo $json->asJSON();