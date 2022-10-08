<?php

    namespace KSeven\cPanel\Functions;

    use KSeven\CPanel\Init;

    /**
     *  Class Databases
     *
     *  @package KSeven\CPanel\Functions
     */
    class Databases
    {
        /**
         *  @var CPanel
         */
        protected $exc;

        /**
         *  Accounts constructor.
         *
         *  @param WHMClient $client
         */
        public function __construct(Init $client)
        {
            $this->exc = $client;
        }

        /**
         *  CPanel API function: Mysql -> get_server_information
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/get_server_information/
         * 
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/get_server_information
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "get_server_information",
         *      "module": "Mysql",
         *      "result": {
         *          "data": {
         *              "host": "192.0.2.1",
         *              "is_remote": 1,
         *              "version": "5.6.23"
         *          },
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {},
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         *
         *  @return array
         */
        public function getServerInformationDatabase()
        {
            $result = $this->exc->sendRequest("Mysql/get_server_information", []);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status === 1):
                return $result->data;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> locate_server
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/locate_server/
         * 
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/locate_server
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "locate_server",
         *      "module": "Mysql",
         *      "result": {
         *          "data": {
         *              "is_remote": 1,
         *              "remote_host": "192.0.2.1"
         *          },
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {},
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         *
         *  @return array
         */
        public function LocateServerDatabase()
        {
            $result = $this->exc->sendRequest("Mysql/locate_server", []);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status === 1):
                return $result->data;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> check_database
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/Mysql-check_database/
         * 
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/check_database?name=example_test
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "check_database",
         *      "module": "Mysql",
         *      "result": {
         *          "data": {
         *              "msg_text": "OK",
         *              "msg_type": "status",
         *              "table": "table1"
         *          }
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {
         *              "transformed": 1
         *          },
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         *
         *  @return array
         */
        public function CheckDatabase($Name, $Prefix = TRUE)
        {
            if($Prefix):
                $UserPrefix = $this->exc->getUsername();
            endif;
            $result = $this->exc->sendRequest("Mysql/check_database", [
                "name" => $Prefix ? $UserPrefix . "_" . $Name : $Name
            ]);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->status;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> create_database
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/create_database/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/create_database?name=example_test
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "create_database",
         *      "module": "Mysql",
         *      "result": {
         *          "data": null,
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {},
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         * 
         *  @var string $Name
         *  @var bool $Prefix
         *
         *  @return bool
         *  @throws bool
         */
        public function CreateDatabase($Name, $Prefix = TRUE)
        {
            if($Prefix):
                $UserPrefix = $this->exc->getUsername();
            endif;
            $result = $this->exc->sendRequest("Mysql/create_database", [
                "name" => $Prefix ? $UserPrefix . "_" . $Name : $Name
            ]);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->status;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> delete_database
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/delete_database/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/delete_database?name=example_test
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "delete_database",
         *      "module": "Mysql",
         *      "result": {
         *          "data": null,
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {},
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         * 
         *  @var string $Name
         *  @var bool $Prefix
         *
         *  @return bool
         *  @throws bool
         */
        public function DeleteDatabase($Name, $Prefix = TRUE)
        {
            if($Prefix):
                $UserPrefix = $this->exc->getUsername();
            endif;
            $result = $this->exc->sendRequest("Mysql/delete_database", [
                "name" => $Prefix ? $UserPrefix . "_" . $Name : $Name
            ]);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->status;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> dump_database_schema
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/dump_database_schema/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/dump_database_schema?dbname=username_example_db
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "dump_database_schema",
         *      "module": "Mysql",
         *      "result": {
         *          "data": "-- MySQL dump 10.13  D...",
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {
         *              "transformed": 1
         *          },
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         * 
         *  @var string $Name
         *  @var bool $Prefix
         *
         *  @return string
         *  @throws bool
         */
        public function DumpSchemaDatabase($Name, $Prefix = TRUE)
        {
            if($Prefix):
                $UserPrefix = $this->exc->getUsername();
            endif;
            $result = $this->exc->sendRequest("Mysql/dump_database_schema", [
                "name" => $Prefix ? $UserPrefix . "_" . $Name : $Name
            ]);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->data;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> list_databases
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/list_databases/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/list_databases
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "list_databases",
         *      "module": "Mysql",
         *      "result": {
         *          "data": {
         *              "database": "user_db",
         *              "disk_usage": 673,
         *              "users": {
         *                  "db_user",
         *                  "db2_user"
         *              },
         *          },
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {
         *              "transformed": 1
         *          },
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         * 
         *  @return array
         */
        public function getDatabases()
        {
            $result = $this->exc->sendRequest("Mysql/list_databases", []);
            $result = json_decode($result);
            if (!empty($result->metadata) && $result->metadata->transformed === 1):
                return $result->data;
            endif;
            return [];
        }

        /**
         *  CPanel API function: Mysql -> rename_database
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/Mysql-rename_database/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/rename_database?oldname=mydb&newname=newlyrenamed
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "rename_database",
         *      "module": "Mysql",
         *      "result": {
         *          "data": null,
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {},
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         * 
         *  @var string $OldName
         *  @var string $NewName
         *  @var bool $Prefix
         *
         *  @return string
         *  @throws bool
         */
        public function RenameDatabase($OldName, $NewName, $Prefix = TRUE)
        {
            if($Prefix):
                $UserPrefix = $this->exc->getUsername();
            endif;
            $result = $this->exc->sendRequest("Mysql/rename_database", [
                "oldname" => $Prefix ? $UserPrefix . "_" . $OldName : $OldName,
                "newname" => $Prefix ? $UserPrefix . "_" . $NewName : $NewName
            ]);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->data;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> repair_database
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/repair_database/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/repair_database?name=example_db
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "repair_database",
         *      "module": "Mysql",
         *      "result": {
         *          "data": {
         *              "msg_text": "OK",
         *              "msg_type": "status",
         *              "table": "table1"
         *          }
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {
         *              "transformed": 1
         *          },
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         * 
         *  @var string $Name
         *  @var bool $Prefix
         *
         *  @return string
         *  @throws bool
         */
        public function RepairDatabase($Name, $Prefix = TRUE)
        {
            if($Prefix):
                $UserPrefix = $this->exc->getUsername();
            endif;
            $result = $this->exc->sendRequest("Mysql/repair_database", [
                "name" => $Prefix ? $UserPrefix . "_" . $Name : $Name
            ]);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->data;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> update_privileges
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/Mysql-update_privileges/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/update_privileges
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "update_privileges",
         *      "module": "Mysql",
         *      "result": {
         *          "data": null,
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {},
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         * 
         *  @return array
         */
        public function UpdatePrivilegesDatabase()
        {
            $result = $this->exc->sendRequest("Mysql/update_privileges", []);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->data;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> add_host
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/add_host/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/add_host?host=192.168.1.6
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "add_host",
         *      "module": "Mysql",
         *      "result": {
         *          "data": null,
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {},
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         * 
         *  @var string $Host
         * 
         *  @return array
         */
        public function AddHostDatabase($Host)
        {
            $result = $this->exc->sendRequest("Mysql/add_host", [
                "add_host" => $Host
            ]);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->data;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> add_host_note
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/Mysql-add_host_note/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/add_host_note?host=192.168.1.6&note=note
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "add_host_note",
         *      "module": "Mysql",
         *      "result": {
         *          "data": null,
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {},
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         * 
         *  @var string $Host
         *  @var string $Note
         * 
         *  @return array
         */
        public function AddHostNoteDatabase($Host, $Note)
        {
            $result = $this->exc->sendRequest("Mysql/add_host_note", [
                "host" => $Host,
                "note" => $Note
            ]);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->data;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> delete_host
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/delete_host/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/delete_host?host=remote.example.com
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "delete_host",
         *      "module": "Mysql",
         *      "result": {
         *          "data": null,
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {},
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         * 
         *  @var string $Host
         *
         *  @return array
         */
        public function DeleteHostDatabase($Host)
        {
            $result = $this->exc->sendRequest("Mysql/delete_host", [
                "host" => $Host,
            ]);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->data;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> get_host_notes
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/get_host_notes/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/get_host_notes
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "get_host_notes",
         *      "module": "Mysql",
         *      "result": {
         *          "data": {
         *              "1.2.3.45": "The combination on my luggage",
         *              "12.34.56.78": "Located somewhere in the Ford Galaxy",
         *              "8.8.8.8": "Located on Spaceball 1"
         *          },
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {},
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         * 
         *  @return array
         */
        public function getHostNotesDatabases()
        {
            $result = $this->exc->sendRequest("Mysql/get_host_notes", []);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->data;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> create_user
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/Mysql-create_user/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/create_user?name=dbuser&password=12345luggage
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "create_user",
         *      "module": "Mysql",
         *      "result": {
         *          "data": null,
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {},
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         * 
         *  @var string $User
         *  @var string $Password
         *  @var bool $Prefix
         *
         *  @return bool
         *  @throws bool
         */
        public function CreateUserDatabase($User, $Password, $Prefix = TRUE)
        {
            if($Prefix):
                $UserPrefix = $this->exc->getUsername();
            endif;
            $result = $this->exc->sendRequest("Mysql/create_database", [
                "dbuser" => $Prefix ? $UserPrefix . "_" . $User : $User,
                "password" => $Password
            ]);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->status;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> delete_user
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/Mysql::delete_user/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/delete_user?name=dbuser
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "delete_user",
         *      "module": "Mysql",
         *      "result": {
         *          "data": null,
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {},
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         * 
         *  @var string $User
         *  @var bool $Prefix
         *
         *  @return bool
         *  @throws bool
         */
        public function DeleteUserDatabase($User, $Prefix = TRUE)
        {
            if($Prefix):
                $UserPrefix = $this->exc->getUsername();
            endif;
            $result = $this->exc->sendRequest("Mysql/delete_user", [
                "name" => $Prefix ? $UserPrefix . "_" . $User : $User
            ]);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->status;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> get_privileges_on_database
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/Mysql-get_privileges_on_database/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/get_privileges_on_database?user=dbuser&database=mydb
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "get_privileges_on_database",
         *      "module": "Mysql",
         *      "result": {
         *          "data": {
         *              "CREATE"
         *          },
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {
         *              "transformed": 1
         *          },
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         *
         *  @var string $User
         *  @var string $Name
         *  @var bool $Prefix
         *
         *  @return bool
         *  @throws bool
         */
        public function getPrivilegesOnDatabase($User, $Name, $Prefix = TRUE)
        {
            if($Prefix):
                $UserPrefix = $this->exc->getUsername();
            endif;
            $result = $this->exc->sendRequest("Mysql/get_privileges_on_database", [
                "user" => $Prefix ? $UserPrefix . "_" . $User : $User,
                "database" => $Prefix ? $UserPrefix . "_" . $Name : $Name,
            ]);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->status;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> get_restrictions
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/get_restrictions/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/get_restrictions
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "get_restrictions",
         *      "module": "Mysql",
         *      "result": {
         *          "data": {
         *              "max_database_name_length": 64,
         *              "max_username_length": 16,
         *              "prefix": "user_"
         *          },
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {},
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         *
         *  @return bool
         *  @throws bool
         */
        public function getRestrictionsDatabases()
        {
            $result = $this->exc->sendRequest("Mysql/get_privileges_on_database", []);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->data;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> list_routines
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/list_routines/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/list_routines
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "list_routines",
         *      "module": "Mysql",
         *      "result": {
         *          "data": {
         *              "cptest_newdb.hello",
         *              "cptest_newdb.my_routine"
         *          },
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {
         *              "transformed": 1
         *          },
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         *
         *  @var string $User
         *  @var string $Name
         *  @var bool $Prefix
         *
         *  @return bool
         *  @throws bool
         */
        public function ListRoutinesDatabases()
        {
            $result = $this->exc->sendRequest("Mysql/list_routines", []);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->data;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> list_users
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/Mysql-list_users/
         *
         *  Request Sample:
         *  @link 
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "list_users",
         *      "module": "Mysql",
         *      "result": {
         *          "data": {
         *              "databases": [
         *                  "user_database1",
         *                  "user_database2"
         *              },
         *              "shortuser": "user1",
         *              "user": "example_user1"
         *          },
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {
         *              "transformed": 1
         *          },
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         *
         *  @return bool
         *  @throws bool
         */
        public function ListUsersDatabases()
        {
            $result = $this->exc->sendRequest("Mysql/list_users", []);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->data;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> rename_user
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/rename_user/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/rename_user?oldname=dbuser&newname=mynewusername
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "rename_user",
         *      "module": "Mysql",
         *      "result": {
         *          "data": null,
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {},
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         *
         *  @var string $OldName
         *  @var string $NewName
         *  @var bool $Prefix
         *
         *  @return bool
         *  @throws bool
         */
        public function RenameUserDatabase($OldName, $NewName, $Prefix = TRUE)
        {
            if($Prefix):
                $UserPrefix = $this->exc->getUsername();
            endif;
            $result = $this->exc->sendRequest("Mysql/rename_user", [
                "oldname" => $Prefix ? $UserPrefix . "_" . $OldName : $OldName,
                "newname" => $Prefix ? $UserPrefix . "_" . $NewName : $NewName,
            ]);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->status;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> 
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/revoke_access_to_database/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/revoke_access_to_database?user=dbuser&database=mydb
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "revoke_access_to_database",
         *      "module": "Mysql",
         *      "result": {
         *          "data": null,
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {},
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         *
         *  @var string $User
         *  @var string $Database
         *  @var bool $Prefix
         *
         *  @return bool
         *  @throws bool
         */
        public function RemovePrivilegesUserDatabase($Database, $User, $Prefix = TRUE)
        {
            if($Prefix):
                $UserPrefix = $this->exc->getUsername();
            endif;
            $result = $this->exc->sendRequest("Mysql/revoke_access_to_database", [
                "user" => $Prefix ? $UserPrefix . "_" . $User : $User,
                "database" => $Prefix ? $UserPrefix . "_" . $Database : $Database,
            ]);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->status;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> set_password
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/Mysql-set_password/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/set_password?user=dbuser&password=12345luggage
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "set_password",
         *      "module": "Mysql",
         *      "result": {
         *          "data": {
         *              "failures": {
         *                  "error": "string",
         *                  "host": "string"
         *              }
         *          },
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {},
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         *
         *  @var string $User
         *  @var string $Password
         *  @var bool $Prefix
         *
         *  @return bool
         *  @throws bool
         */
        public function SetPasswordUserDatabase($User, $Password, $Prefix = TRUE)
        {
            if($Prefix):
                $UserPrefix = $this->exc->getUsername();
            endif;
            $result = $this->exc->sendRequest("Mysql/set_password", [
                "user" => $Prefix ? $UserPrefix . "_" . $User : $User,
                "password" => $Password,
            ]);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->status;
            endif;
            return $result->errors;
        }

        /**
         *  CPanel API function: Mysql -> set_privileges_on_database
         *  @link https://api.docs.cpanel.net/openapi/cpanel/operation/set_privileges_on_database/
         *
         *  Request Sample:
         *  @link https://hostname.example.com:2083/cpsess##########/execute/Mysql/set_privileges_on_database?user=cpuser_dbuser&database=cpuser_dbname
         * 
         *  Response samples: 200 - application/json
         *  {
         *      "apiversion": 3,
         *      "func": "set_privileges_on_database",
         *      "module": "Mysql",
         *      "result": {
         *          "data": {},
         *          "errors": null,
         *          "messages": null,
         *          "metadata": {},
         *          "status": 1,
         *          "warnings": null
         *      }
         *  }
         *
         *  @var string $User
         *  @var string $Name
         *  @var string $Privileges
         *  @var bool $Prefix
         *
         *  @return bool
         *  @throws bool
         */
        public function SetPrivilegesUserDatabase($User, $Name, $Privileges = "ALL PRIVILEGES", $Prefix = TRUE)
        {
            if($Prefix):
                $UserPrefix = $this->exc->getUsername();
            endif;
            $result = $this->exc->sendRequest("Mysql/set_privileges_on_database", [
                "user" => $Prefix ? $UserPrefix . "_" . $User : $User,
                "database" => $Prefix ? $UserPrefix . "_" . $Name : $Name,
                "privileges" => $Privileges,
            ]);
            $result = json_decode($result);
            if (!empty($result->status) && $result->status):
                return $result->status;
            endif;
            return $result->errors;
        }

    }