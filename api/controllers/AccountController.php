<?php

abstract class AccountController extends BaseController {

    /**@* {Array} A temporary storage of data that will be used to create a new object in the database. */
	const TYPE = "Account";
}

AJAX::registerGetMethods("Account", array("Get", "Search"));
AJAX::registerPostMethods("Account", array("Create", "Update", "Delete"));