# wordpress
Wordpress docker image.
Does not fiddle with mysql databases, stays within its wordpress-app scope. Therefore assumes a mysql database is created out-of-scope and should just be referenced to.

# Setup

```
oc project openshift
oc new-build https://github.com/hoolia/wordpress.git
```

# Disaster recovery

Restore point-in-time dump:

```
vi examples/mysql-restore.yaml
oc create -f examples/mysql-restore.yaml
```

Reference: https://github.com/mariadb-operator/mariadb-operator/blob/main/docs/galera.md
If nodes don't want to Sync/Communicatie with each other because nobody want to become primary, then force primary:

```
oc patch mariadb mysql -n grncloud-wordpress --type merge -p '{
   "spec":{
     "galera":{
       "enabled":true,
       "recovery":{
         "enabled":true,
         "forceClusterBootstrapInPod":"mysql-0"
       }
     }
   }
 }'

sleep 300

oc patch mariadb mysql -n grncloud-wordpress --type merge -p '{
  "spec":{
    "galera":{
      "recovery":{
        "forceClusterBootstrapInPod":null
      }
    }
  }
}'

```

# Changelog
- Initial: copy from library/wordpress
- 2015-09-14: Removed mysql dependency
- 2016-08-14: Added S2I scripts
- 2016-08-14: Added Flyway
- 2025-10-01: Added Redis Cache + MariaDB Operator
