<?php

class OntraportHook{

	private $_api_id = "2_20152_HT57ms0E7";
	private $_api_key = "gI1CIAJi25FBAlr";

	const REQUEST_URI = "http://api.ontraport.com/cdata.php";

	public function __construct(){

	}

	public function addContact($normalizedData){
		$data = '<contact>
    <Group_Tag name="Contact Information">
        <field name="First Name">'.$normalizedData["fname"].'</field>
        <field name="Last Name">'.$normalizedData["lname"].'</field>
        <field name="Email">'.$normalizedData["email"].'</field>
    </Group_Tag>
</contact>';

		return $this->_Request("add", $data)
	}

	public function deleteContact($normalizedData){
		$data = '
<contact>
    <Group_Tag name="Contact Information">
        <field name="First Name">'.$normalizedData["fname"].'</field>
        <field name="Last Name">'.$normalizedData["lname"].'</field>
        <field name="Email">'.$normalizedData["email"].'</field>
    </Group_Tag>
</contact>';

		return $this->_Request($data)
	}

	public function addContactDropdown($normalizedData){
		$data = '<data>
    <field name="Dropdown Test">
        <option>Option 1</option>
        <option>Option 2</option>
    </field>
</data>';

		return $this->_Request("add_dropdown", $data)
	}

	public function addContactFieldSection($normalizedData){
		$data = '<data>
    <Group_Tag name="My Section">
        <field name="MyTest1" type="numeric"/>
        <field name="MyTest2" type="text"/>
        <field name="MyTest3" type="country"/>
    </Group_Tag>
</data>';

		return $this->_Request("add_section", $data)
	}


	public function addContactNotes($normalizedData){
		$data = '<contact id="24">
    <note time='1341565200'>Note Contents right here yo mo</note>
</contact>';

		return $this->_Request("add_notes", $data)
	}

	public function addContactTag($normalizedData){
		$data = '<contact id='16972'>
    <tag>Tag1</tag>
    <tag>Tag2</tag>
</contact>';

		return $this->_Request("add_tag", $data)
	}

	public function editContactFieldSection($normalizedData){
		$data = '<data>
    <Group_Tag name="My Section">
        <field name="NewField1" type="longtext"/>
    </Group_Tag>
</data>';

		return $this->_Request("edit_section", $data)
	}

	public function getContact($normalizedData){
		$data = '<contact_id>1</contact_id>
<contact_id>24</contact_id>';

		return $this->_Request("fetch", $data)
	}

	public function getContactNotes($normalizedData){
		$data = '<contact_id>12345</contact_id>';

		return $this->_Request("fetch_notes", $data)
	}

	public function getContactSequences($normalizedData){
		$data = '';

		return $this->_Request("fetch_sequences", $data)
	}

	public function getContactTags($normalizedData){
		$data = '<contact_id>1</contact_id>';

		return $this->_Request("fetch_tag", $data)
	}

	public function getDeletedContacts($normalizedData){
		$data = '<dateStart="1348170304">
<dateEnd="1353440704">';

		return $this->_Request("get_deletedcontacts", $data)
	}

	public function getContactKey($normalizedData){
		$data = '';

		return $this->_Request("key", $data)
	}

	public function getContactPullTag($normalizedData){
		$data = '<contact_id>1</contact_id>
<contact_id>24</contact_id>';

		return $this->_Request("pull_tag", $data)
	}



	public function deleteContactDropdown($normalizedData){
		$data = '<data>
    <field name="Dropdown Test">
        <option>Option 1</option>
        <option>Option 2</option>
    </field>
</data>';

		return $this->_Request("remove_dropdown", $data)
	}


	public function deleteContactField($normalizedData){
		$data = '<Group_Tag name="My Section">
    <field name="Field 1"/>
</Group_Tag>';

		return $this->_Request("remove_field", $data)
	}


	public function deleteContactFieldSection($normalizedData){
		$data = '<data>
    <Group_Tag name="blah"/>
</data>';

		return $this->_Request("remove_section", $data)
	}


	public function deleteContactTag($normalizedData){
		$data = '<contact id='16972'>
    <tag>Tag1</tag>
    <tag>Tag2</tag>
</contact>';

		return $this->_Request("remove_tag", $data)
	}


	public function searchContacts($normalizedData){
		$data = '<search>
	<equation>
		<field>First Name</field>
		<op>e</op>
		<value>Multiple,First,Names</value>
	</equation>
	<equation>
		<field>Last Name</field>
		<op>n</op>
		<value>Jones</value>
	</equation>
</search>';

		return $this->_Request("search", $data)
	}


	public function updateContact($normalizedData){
		$data = '<contact id="12345">
    <Group_Tag name="Contact Information">
        <field name="Company">Ontraport</field>
        <field name="Home Phone">5555555</field>
    </Group_Tag>
</contact>

<contact id="98765">
    <Group_Tag name="Contact Information">
        <field name="Email">test@test.com</field>
    </Group_Tag>
</contact>';

		return $this->_Request("update", $data)
	}


	public function deleteContactDropdown($normalizedData){
		$data = '<data>
    <field name="Dropdown Test">
        <option>Option 1</option>
        <option>Option 2</option>
    </field>
</data>';

		return $this->_Request("remove_dropdown", $data)
	}


	public function deleteContactDropdown($normalizedData){
		$data = '<data>
    <field name="Dropdown Test">
        <option>Option 1</option>
        <option>Option 2</option>
    </field>
</data>';

		return $this->_Request("remove_dropdown", $data)
	}
	protected function _Request($reqType, $data, $requestID = false, $requestReturnID = false){
		$data = urlencode(urlencode($data));

		$postargs = "appid=".$this->appid."&key=".$this->key."&reqType=".$reqType;

		if ($requestID === false){
			$postargs .= "&id=" . $requestID;
		}

		if ($requestReturnID === false){
			$postargs .= "&return_id=" . $requestReturnID;
		}

		$postargs .= "&data=".$data;

		$session = curl_init(self::REQUEST_URI);
		curl_setopt ($session, CURLOPT_POST, true);
		curl_setopt ($session, CURLOPT_POSTFIELDS, $postargs);
		curl_setopt($session, CURLOPT_HEADER, false);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($session);
		curl_close($session);

		return $response;
	}
}