define({ "api": [
  {
    "type": "get",
    "url": "/",
    "title": "Lists all API endpoints available, including method to use, url and examples",
    "version": "0.1.2",
    "name": "Index",
    "group": "Index",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "Index"
  },
  {
    "type": "get",
    "url": "/alliance/find/:allianceName/",
    "title": "Find a alliance",
    "version": "0.1.2",
    "name": "Find",
    "group": "alliance",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "allianceName",
            "description": "<p>the allianceName</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/alliance/find/:allianceName/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "alliance"
  },
  {
    "type": "get",
    "url": "/alliance/information/:allianceID/",
    "title": "Show information for a single alliance",
    "version": "0.1.2",
    "name": "Information",
    "group": "alliance",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "allianceID",
            "description": "<p>the allianceID</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/alliance/information/:allianceID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "alliance"
  },
  {
    "type": "get",
    "url": "/alliance/members/:allianceID/",
    "title": "Show all members in a alliance",
    "version": "0.1.2",
    "name": "Members",
    "group": "alliance",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "allianceID",
            "description": "<p>the allianceID</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/alliance/members/:allianceID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "alliance"
  },
  {
    "type": "get",
    "url": "/alliance/",
    "title": "List the endpoints available for the alliance api",
    "version": "0.1.2",
    "name": "index",
    "group": "alliance",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/alliance/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "alliance"
  },
  {
    "type": "get",
    "url": "/celestial/information/:solarSystemID/",
    "title": "Show information for a single celestial",
    "version": "0.1.2",
    "name": "Information",
    "group": "celestial",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "solarSystemID",
            "description": "<p>the solarSystemID</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/celestial/information/:solarSystemID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "celestial"
  },
  {
    "type": "get",
    "url": "/celestial/",
    "title": "List the endpoints available for the celestial api",
    "version": "0.1.2",
    "name": "index",
    "group": "celestial",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/celestial/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "celestial"
  },
  {
    "type": "get",
    "url": "/character/find/:characterName/",
    "title": "Find a character",
    "version": "0.1.2",
    "name": "Find",
    "group": "character",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "characterName",
            "description": "<p>the characterName</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/character/find/:characterName/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "character"
  },
  {
    "type": "get",
    "url": "/character/information/:characterID/",
    "title": "Show information for a single character",
    "version": "0.1.2",
    "name": "Information",
    "group": "character",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "characterID",
            "description": "<p>the characterID</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/character/information/:characterID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "character"
  },
  {
    "type": "get",
    "url": "/character/",
    "title": "List the endpoints available for the character api",
    "version": "0.1.2",
    "name": "index",
    "group": "character",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/character/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "character"
  },
  {
    "type": "get",
    "url": "/corporation/find/:corporationName/",
    "title": "Find a corporation",
    "version": "0.1.2",
    "name": "Find",
    "group": "corporation",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "corporationName",
            "description": "<p>the corporationName</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/corporation/find/:corporationName/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "corporation"
  },
  {
    "type": "get",
    "url": "/corporation/information/:corporationID/",
    "title": "Show information for a single corporation",
    "version": "0.1.2",
    "name": "Information",
    "group": "corporation",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "corporationID",
            "description": "<p>the corporationID</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/corporation/information/:corporationID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "corporation"
  },
  {
    "type": "get",
    "url": "/corporation/members/:corporationID/",
    "title": "Show all members in a corporation",
    "version": "0.1.2",
    "name": "Members",
    "group": "corporation",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "corporationID",
            "description": "<p>the corporationID</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/corporation/members/:corporationID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "corporation"
  },
  {
    "type": "get",
    "url": "/corporation/",
    "title": "List the endpoints available for the corporation api",
    "version": "0.1.2",
    "name": "index",
    "group": "corporation",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/corporation/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "corporation"
  },
  {
    "type": "get",
    "url": "/item/find/:itemName/",
    "title": "Find a item",
    "version": "0.1.2",
    "name": "Find",
    "group": "item",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "itemName",
            "description": "<p>the itemName</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/item/find/:itemName/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "item"
  },
  {
    "type": "get",
    "url": "/item/information/:itemID/",
    "title": "Show information for a single item",
    "version": "0.1.2",
    "name": "Information",
    "group": "item",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "itemID",
            "description": "<p>the itemID</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/item/information/:itemID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "item"
  },
  {
    "type": "get",
    "url": "/item/",
    "title": "List the endpoints available for the item api",
    "version": "0.1.2",
    "name": "index",
    "group": "item",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/item/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "item"
  },
  {
    "type": "get",
    "url": "/kill/afterDate/:afterDate/",
    "title": "List kills happening after a certain date",
    "version": "0.1.2",
    "name": "afterDate",
    "group": "kill",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "DateTime",
            "optional": false,
            "field": "afterDate",
            "description": "<p>Return kills after a certain date (YYYY-mm-dd HH:ii:ss)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "killID",
            "description": "<p>the killID</p>"
          },
          {
            "group": "Parameter",
            "type": "DateTime",
            "optional": true,
            "field": "killTime",
            "description": "<p>Limit to a specific time (YYYY-mm-dd HH:ii:ss)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "solarSystemID",
            "description": "<p>Limit to a specific solarSystemID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "regionID",
            "description": "<p>Limit to a specific regionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "characterID",
            "description": "<p>Limit to a specific characterID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "corporationId",
            "description": "<p>Limit to a specific corporationID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "allianceID",
            "description": "<p>Limit to a specific allianceID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "factionID",
            "description": "<p>Limit to a specific factionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "shipTypeID",
            "description": "<p>Limit to a specific shipTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "groupID",
            "description": "<p>Limit to a specific groupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "vGroupID",
            "description": "<p>Limit to a specific vGroupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "weaponTypeID",
            "description": "<p>Limit to a specific weaponTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "shipValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "damageDone",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "totalValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "pointValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "numberInvolved",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isVictim",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "finalBlow",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isNPC",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "limit",
            "description": "<p>1 to 100</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "order",
            "description": "<p>asc or desc (case sensitive)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "offset",
            "description": "<p>Return records after a certain offset</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/kill/afterDate/:afterDate/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kill"
  },
  {
    "type": "get",
    "url": "/kill/alliance/:allianceID/",
    "title": "List kills for a certain alliance",
    "version": "0.1.2",
    "name": "alliance",
    "group": "kill",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "allianceID",
            "description": "<p>Limit to a specific allianceID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "killID",
            "description": "<p>the killID</p>"
          },
          {
            "group": "Parameter",
            "type": "DateTime",
            "optional": true,
            "field": "killTime",
            "description": "<p>Limit to a specific time (YYYY-mm-dd HH:ii:ss)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "solarSystemID",
            "description": "<p>Limit to a specific solarSystemID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "regionID",
            "description": "<p>Limit to a specific regionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "characterID",
            "description": "<p>Limit to a specific characterID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "corporationId",
            "description": "<p>Limit to a specific corporationID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "factionID",
            "description": "<p>Limit to a specific factionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "shipTypeID",
            "description": "<p>Limit to a specific shipTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "groupID",
            "description": "<p>Limit to a specific groupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "vGroupID",
            "description": "<p>Limit to a specific vGroupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "weaponTypeID",
            "description": "<p>Limit to a specific weaponTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "shipValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "damageDone",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "totalValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "pointValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "numberInvolved",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isVictim",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "finalBlow",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isNPC",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "limit",
            "description": "<p>1 to 100</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "order",
            "description": "<p>asc or desc (case sensitive)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "offset",
            "description": "<p>Return records after a certain offset</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/kill/alliance/:allianceID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kill"
  },
  {
    "type": "get",
    "url": "/kill/beforeDate/:beforeDate/",
    "title": "List kills happening before a certain date",
    "version": "0.1.2",
    "name": "beforeDate",
    "group": "kill",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "DateTime",
            "optional": false,
            "field": "beforeDate",
            "description": "<p>Return kills before a certain date (YYYY-mm-dd HH:ii:ss)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "killID",
            "description": "<p>the killID</p>"
          },
          {
            "group": "Parameter",
            "type": "DateTime",
            "optional": true,
            "field": "killTime",
            "description": "<p>Limit to a specific time (YYYY-mm-dd HH:ii:ss)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "solarSystemID",
            "description": "<p>Limit to a specific solarSystemID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "regionID",
            "description": "<p>Limit to a specific regionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "characterID",
            "description": "<p>Limit to a specific characterID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "corporationId",
            "description": "<p>Limit to a specific corporationID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "allianceID",
            "description": "<p>Limit to a specific allianceID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "factionID",
            "description": "<p>Limit to a specific factionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "shipTypeID",
            "description": "<p>Limit to a specific shipTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "groupID",
            "description": "<p>Limit to a specific groupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "vGroupID",
            "description": "<p>Limit to a specific vGroupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "weaponTypeID",
            "description": "<p>Limit to a specific weaponTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "shipValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "damageDone",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "totalValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "pointValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "numberInvolved",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isVictim",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "finalBlow",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isNPC",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "limit",
            "description": "<p>1 to 100</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "order",
            "description": "<p>asc or desc (case sensitive)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "offset",
            "description": "<p>Return records after a certain offset</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/kill/beforeDate/:beforeDate/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kill"
  },
  {
    "type": "get",
    "url": "/kill/betweenDates/:afterDate/:beforeDate/",
    "title": "List kills between two dates",
    "version": "0.1.2",
    "name": "betweenDates",
    "group": "kill",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "DateTime",
            "optional": false,
            "field": "afterDate",
            "description": "<p>Get kills after this date (YYYY-mm-dd HH:ii:ss)</p>"
          },
          {
            "group": "Parameter",
            "type": "DateTime",
            "optional": false,
            "field": "beforeDate",
            "description": "<p>But before this date (YYYY-mm-dd HH:ii:ss)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "killID",
            "description": "<p>the killID</p>"
          },
          {
            "group": "Parameter",
            "type": "DateTime",
            "optional": true,
            "field": "killTime",
            "description": "<p>Limit to a specific time (YYYY-mm-dd HH:ii:ss)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "solarSystemID",
            "description": "<p>Limit to a specific solarSystemID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "regionID",
            "description": "<p>Limit to a specific regionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "characterID",
            "description": "<p>Limit to a specific characterID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "corporationId",
            "description": "<p>Limit to a specific corporationID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "allianceID",
            "description": "<p>Limit to a specific allianceID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "factionID",
            "description": "<p>Limit to a specific factionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "shipTypeID",
            "description": "<p>Limit to a specific shipTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "groupID",
            "description": "<p>Limit to a specific groupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "vGroupID",
            "description": "<p>Limit to a specific vGroupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "weaponTypeID",
            "description": "<p>Limit to a specific weaponTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "shipValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "damageDone",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "totalValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "pointValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "numberInvolved",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isVictim",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "finalBlow",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isNPC",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "limit",
            "description": "<p>1 to 100</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "order",
            "description": "<p>asc or desc (case sensitive)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "offset",
            "description": "<p>Return records after a certain offset</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/kill/betweenDates/:afterDate/:beforeDate/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kill"
  },
  {
    "type": "get",
    "url": "/kill/character/:characterID/",
    "title": "List kills for a certain character",
    "version": "0.1.2",
    "name": "character",
    "group": "kill",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "characterID",
            "description": "<p>Limit to a specific characterID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "killID",
            "description": "<p>the killID</p>"
          },
          {
            "group": "Parameter",
            "type": "DateTime",
            "optional": true,
            "field": "killTime",
            "description": "<p>Limit to a specific time (YYYY-mm-dd HH:ii:ss)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "solarSystemID",
            "description": "<p>Limit to a specific solarSystemID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "regionID",
            "description": "<p>Limit to a specific regionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "corporationId",
            "description": "<p>Limit to a specific corporationID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "allianceID",
            "description": "<p>Limit to a specific allianceID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "factionID",
            "description": "<p>Limit to a specific factionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "shipTypeID",
            "description": "<p>Limit to a specific shipTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "groupID",
            "description": "<p>Limit to a specific groupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "vGroupID",
            "description": "<p>Limit to a specific vGroupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "weaponTypeID",
            "description": "<p>Limit to a specific weaponTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "shipValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "damageDone",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "totalValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "pointValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "numberInvolved",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isVictim",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "finalBlow",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isNPC",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "limit",
            "description": "<p>1 to 100</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "order",
            "description": "<p>asc or desc (case sensitive)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "offset",
            "description": "<p>Return records after a certain offset</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/kill/character/:characterID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kill"
  },
  {
    "type": "get",
    "url": "/kill/corporation/:corporationID/",
    "title": "List kills for a certain corporation",
    "version": "0.1.2",
    "name": "corporation",
    "group": "kill",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "corporationID",
            "description": "<p>Limit to a specific corporationID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "killID",
            "description": "<p>the killID</p>"
          },
          {
            "group": "Parameter",
            "type": "DateTime",
            "optional": true,
            "field": "killTime",
            "description": "<p>Limit to a specific time (YYYY-mm-dd HH:ii:ss)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "solarSystemID",
            "description": "<p>Limit to a specific solarSystemID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "regionID",
            "description": "<p>Limit to a specific regionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "characterID",
            "description": "<p>Limit to a specific characterID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "corporationId",
            "description": "<p>Limit to a specific corporationID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "allianceID",
            "description": "<p>Limit to a specific allianceID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "factionID",
            "description": "<p>Limit to a specific factionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "shipTypeID",
            "description": "<p>Limit to a specific shipTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "groupID",
            "description": "<p>Limit to a specific groupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "vGroupID",
            "description": "<p>Limit to a specific vGroupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "weaponTypeID",
            "description": "<p>Limit to a specific weaponTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "shipValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "damageDone",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "totalValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "pointValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "numberInvolved",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isVictim",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "finalBlow",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isNPC",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "limit",
            "description": "<p>1 to 100</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "order",
            "description": "<p>asc or desc (case sensitive)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "offset",
            "description": "<p>Return records after a certain offset</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/kill/corporation/:corporationID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kill"
  },
  {
    "type": "get",
    "url": "/kill/faction/:factionID/",
    "title": "List kills for a certain faction",
    "version": "0.1.2",
    "name": "faction",
    "group": "kill",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "factionID",
            "description": "<p>Limit to a specific factionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "killID",
            "description": "<p>the killID</p>"
          },
          {
            "group": "Parameter",
            "type": "DateTime",
            "optional": true,
            "field": "killTime",
            "description": "<p>Limit to a specific time (YYYY-mm-dd HH:ii:ss)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "solarSystemID",
            "description": "<p>Limit to a specific solarSystemID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "regionID",
            "description": "<p>Limit to a specific regionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "characterID",
            "description": "<p>Limit to a specific characterID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "corporationId",
            "description": "<p>Limit to a specific corporationID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "allianceID",
            "description": "<p>Limit to a specific allianceID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "shipTypeID",
            "description": "<p>Limit to a specific shipTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "groupID",
            "description": "<p>Limit to a specific groupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "vGroupID",
            "description": "<p>Limit to a specific vGroupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "weaponTypeID",
            "description": "<p>Limit to a specific weaponTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "shipValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "damageDone",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "totalValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "pointValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "numberInvolved",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isVictim",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "finalBlow",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isNPC",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "limit",
            "description": "<p>1 to 100</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "order",
            "description": "<p>asc or desc (case sensitive)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "offset",
            "description": "<p>Return records after a certain offset</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/kill/faction/:factionID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kill"
  },
  {
    "type": "get",
    "url": "/kill/group/:groupID/",
    "title": "List kills for a certain group",
    "version": "0.1.2",
    "name": "group",
    "group": "kill",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "groupID",
            "description": "<p>Limit to a specific groupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "killID",
            "description": "<p>the killID</p>"
          },
          {
            "group": "Parameter",
            "type": "DateTime",
            "optional": true,
            "field": "killTime",
            "description": "<p>Limit to a specific time (YYYY-mm-dd HH:ii:ss)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "solarSystemID",
            "description": "<p>Limit to a specific solarSystemID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "regionID",
            "description": "<p>Limit to a specific regionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "characterID",
            "description": "<p>Limit to a specific characterID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "corporationId",
            "description": "<p>Limit to a specific corporationID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "allianceID",
            "description": "<p>Limit to a specific allianceID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "factionID",
            "description": "<p>Limit to a specific factionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "shipTypeID",
            "description": "<p>Limit to a specific shipTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "vGroupID",
            "description": "<p>Limit to a specific vGroupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "weaponTypeID",
            "description": "<p>Limit to a specific weaponTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "shipValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "damageDone",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "totalValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "pointValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "numberInvolved",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isVictim",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "finalBlow",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isNPC",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "limit",
            "description": "<p>1 to 100</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "order",
            "description": "<p>asc or desc (case sensitive)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "offset",
            "description": "<p>Return records after a certain offset</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/kill/group/:groupID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kill"
  },
  {
    "type": "get",
    "url": "/kill/",
    "title": "List the endpoints available for the kill api",
    "version": "0.1.2",
    "name": "index",
    "group": "kill",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/kill/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kill"
  },
  {
    "type": "get",
    "url": "/kill/latest/",
    "title": "Shows the 100 latest killmails",
    "version": "0.1.2",
    "name": "kill",
    "group": "kill",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/kill/latest/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kill"
  },
  {
    "type": "get",
    "url": "/kill/mail/:killID/",
    "title": "List a single killmails data",
    "version": "0.1.2",
    "name": "killmail",
    "group": "kill",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "killID",
            "description": "<p>the killID</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/kill/mail/:killID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kill"
  },
  {
    "type": "get",
    "url": "/killmail/:killID/",
    "title": "List a single killmails data",
    "version": "0.1.2",
    "name": "killmail",
    "group": "kill",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "killID",
            "description": "<p>the killID</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/killmail/:killID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kill"
  },
  {
    "type": "get",
    "url": "/kill/region/:regionID/",
    "title": "List kills that has happened in a certain region",
    "version": "0.1.2",
    "name": "region",
    "group": "kill",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "regionID",
            "description": "<p>Limit to a specific regionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "killID",
            "description": "<p>the killID</p>"
          },
          {
            "group": "Parameter",
            "type": "DateTime",
            "optional": true,
            "field": "killTime",
            "description": "<p>Limit to a specific time (YYYY-mm-dd HH:ii:ss)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "solarSystemID",
            "description": "<p>Limit to a specific solarSystemID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "characterID",
            "description": "<p>Limit to a specific characterID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "corporationId",
            "description": "<p>Limit to a specific corporationID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "allianceID",
            "description": "<p>Limit to a specific allianceID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "factionID",
            "description": "<p>Limit to a specific factionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "shipTypeID",
            "description": "<p>Limit to a specific shipTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "groupID",
            "description": "<p>Limit to a specific groupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "vGroupID",
            "description": "<p>Limit to a specific vGroupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "weaponTypeID",
            "description": "<p>Limit to a specific weaponTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "shipValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "damageDone",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "totalValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "pointValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "numberInvolved",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isVictim",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "finalBlow",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isNPC",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "limit",
            "description": "<p>1 to 100</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "order",
            "description": "<p>asc or desc (case sensitive)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "offset",
            "description": "<p>Return records after a certain offset</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/kill/region/:regionID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kill"
  },
  {
    "type": "get",
    "url": "/kill/shipType/:shipTypeID/",
    "title": "List kills for a certain shipType",
    "version": "0.1.2",
    "name": "shipType",
    "group": "kill",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "shipTypeID",
            "description": "<p>Limit to a specific shipTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "killID",
            "description": "<p>the killID</p>"
          },
          {
            "group": "Parameter",
            "type": "DateTime",
            "optional": true,
            "field": "killTime",
            "description": "<p>Limit to a specific time (YYYY-mm-dd HH:ii:ss)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "solarSystemID",
            "description": "<p>Limit to a specific solarSystemID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "regionID",
            "description": "<p>Limit to a specific regionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "characterID",
            "description": "<p>Limit to a specific characterID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "corporationId",
            "description": "<p>Limit to a specific corporationID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "allianceID",
            "description": "<p>Limit to a specific allianceID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "factionID",
            "description": "<p>Limit to a specific factionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "groupID",
            "description": "<p>Limit to a specific groupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "vGroupID",
            "description": "<p>Limit to a specific vGroupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "weaponTypeID",
            "description": "<p>Limit to a specific weaponTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "shipValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "damageDone",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "totalValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "pointValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "numberInvolved",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isVictim",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "finalBlow",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isNPC",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "limit",
            "description": "<p>1 to 100</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "order",
            "description": "<p>asc or desc (case sensitive)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "offset",
            "description": "<p>Return records after a certain offset</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/kill/shipType/:shipTypeID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kill"
  },
  {
    "type": "get",
    "url": "/kill/solarSystem/:solarSystemID/",
    "title": "List kills that has happened in a certain solar system",
    "version": "0.1.2",
    "name": "solarSystem",
    "group": "kill",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "solarSystemID",
            "description": "<p>Limit to a specific solarSystemID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "killID",
            "description": "<p>the killID</p>"
          },
          {
            "group": "Parameter",
            "type": "DateTime",
            "optional": true,
            "field": "killTime",
            "description": "<p>Limit to a specific time (YYYY-mm-dd HH:ii:ss)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "regionID",
            "description": "<p>Limit to a specific regionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "characterID",
            "description": "<p>Limit to a specific characterID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "corporationId",
            "description": "<p>Limit to a specific corporationID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "allianceID",
            "description": "<p>Limit to a specific allianceID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "factionID",
            "description": "<p>Limit to a specific factionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "shipTypeID",
            "description": "<p>Limit to a specific shipTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "groupID",
            "description": "<p>Limit to a specific groupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "vGroupID",
            "description": "<p>Limit to a specific vGroupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "weaponTypeID",
            "description": "<p>Limit to a specific weaponTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "shipValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "damageDone",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "totalValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "pointValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "numberInvolved",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isVictim",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "finalBlow",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isNPC",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "limit",
            "description": "<p>1 to 100</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "order",
            "description": "<p>asc or desc (case sensitive)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "offset",
            "description": "<p>Return records after a certain offset</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/kill/solarSystem/:solarSystemID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kill"
  },
  {
    "type": "get",
    "url": "/kill/vGroup/:vGroupID/",
    "title": "List kills for a certain vGroup",
    "version": "0.1.2",
    "name": "vGroup",
    "group": "kill",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "vGroupID",
            "description": "<p>Limit to a specific vGroupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "killID",
            "description": "<p>the killID</p>"
          },
          {
            "group": "Parameter",
            "type": "DateTime",
            "optional": true,
            "field": "killTime",
            "description": "<p>Limit to a specific time (YYYY-mm-dd HH:ii:ss)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "solarSystemID",
            "description": "<p>Limit to a specific solarSystemID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "regionID",
            "description": "<p>Limit to a specific regionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "characterID",
            "description": "<p>Limit to a specific characterID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "corporationId",
            "description": "<p>Limit to a specific corporationID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "allianceID",
            "description": "<p>Limit to a specific allianceID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "factionID",
            "description": "<p>Limit to a specific factionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "shipTypeID",
            "description": "<p>Limit to a specific shipTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "groupID",
            "description": "<p>Limit to a specific groupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "weaponTypeID",
            "description": "<p>Limit to a specific weaponTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "shipValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "damageDone",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "totalValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "pointValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "numberInvolved",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isVictim",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "finalBlow",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isNPC",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "limit",
            "description": "<p>1 to 100</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "order",
            "description": "<p>asc or desc (case sensitive)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "offset",
            "description": "<p>Return records after a certain offset</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/kill/vGroup/:vGroupID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kill"
  },
  {
    "type": "get",
    "url": "/kill/weaponType/:weaponTypeID/",
    "title": "List kills for a certain weaponType",
    "version": "0.1.2",
    "name": "weaponType",
    "group": "kill",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "weaponTypeID",
            "description": "<p>Limit to a specific weaponTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "killID",
            "description": "<p>the killID</p>"
          },
          {
            "group": "Parameter",
            "type": "DateTime",
            "optional": true,
            "field": "killTime",
            "description": "<p>Limit to a specific time (YYYY-mm-dd HH:ii:ss)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "solarSystemID",
            "description": "<p>Limit to a specific solarSystemID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "regionID",
            "description": "<p>Limit to a specific regionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "characterID",
            "description": "<p>Limit to a specific characterID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "corporationId",
            "description": "<p>Limit to a specific corporationID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "allianceID",
            "description": "<p>Limit to a specific allianceID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "factionID",
            "description": "<p>Limit to a specific factionID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "shipTypeID",
            "description": "<p>Limit to a specific shipTypeID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "groupID",
            "description": "<p>Limit to a specific groupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "vGroupID",
            "description": "<p>Limit to a specific vGroupID</p>"
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "shipValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "damageDone",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Float",
            "optional": true,
            "field": "totalValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "pointValue",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "numberInvolved",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isVictim",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "finalBlow",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "isNPC",
            "description": "<p>(1 or 0)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "limit",
            "description": "<p>1 to 100</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "order",
            "description": "<p>asc or desc (case sensitive)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "offset",
            "description": "<p>Return records after a certain offset</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/kill/weaponType/:weaponTypeID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kill"
  },
  {
    "type": "get",
    "url": "/market/",
    "title": "List the endpoints available for the market api",
    "version": "0.1.2",
    "name": "index",
    "group": "market",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/market/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "market"
  },
  {
    "type": "get",
    "url": "/market/price/:typeID/",
    "title": "Return the latest pricing value for an item",
    "version": "0.1.2",
    "name": "marketPrice",
    "group": "market",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "typeID",
            "description": "<p>the typeID of the item to lookup a price for</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/market/price/:typeID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "market"
  },
  {
    "type": "get",
    "url": "/market/prices/:typeID/",
    "title": "Return the cached pricing values for an item (Averaged by day)",
    "version": "0.1.2",
    "name": "marketPrices",
    "group": "market",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "typeID",
            "description": "<p>the typeID of the item to lookup prices for</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/market/prices/:typeID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "market"
  },
  {
    "type": "get",
    "url": "/region/find/:regionName/",
    "title": "Find a region",
    "version": "0.1.2",
    "name": "Find",
    "group": "region",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "regionName",
            "description": "<p>the regionName</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/region/find/:regionName/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "region"
  },
  {
    "type": "get",
    "url": "/region/information/:regionID/",
    "title": "Show information for a single region",
    "version": "0.1.2",
    "name": "Information",
    "group": "region",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "regionID",
            "description": "<p>the regionID</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/region/information/:regionID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "region"
  },
  {
    "type": "get",
    "url": "/region/",
    "title": "List the endpoints available for the region api",
    "version": "0.1.2",
    "name": "index",
    "group": "region",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/region/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "region"
  },
  {
    "type": "get",
    "url": "/search/alliance/:allianceName/",
    "title": "Search for an Alliance",
    "version": "0.1.2",
    "name": "findAlliance",
    "group": "search",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "allianceName",
            "description": "<p>Partial Strings are accepted</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/search/alliance/:allianceName/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "search"
  },
  {
    "type": "get",
    "url": "/search/celestial/:SolarSystemName/",
    "title": "Search for celestials in a Solar System",
    "version": "0.1.2",
    "name": "findCelestial",
    "group": "search",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "SolarSystemName",
            "description": "<p>Partial Strings are accepted</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/search/celestial/:SolarSystemName/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "search"
  },
  {
    "type": "get",
    "url": "/search/character/:characterName/",
    "title": "Search for a Character",
    "version": "0.1.2",
    "name": "findCharacter",
    "group": "search",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "characterName",
            "description": "<p>Partial Strings are accepted</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/search/character/:characterName/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "search"
  },
  {
    "type": "get",
    "url": "/search/corporation/:corporationName/",
    "title": "Search for a Corporation",
    "version": "0.1.2",
    "name": "findCorporation",
    "group": "search",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "corporationName",
            "description": "<p>Partial Strings are accepted</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/search/corporation/:corporationName/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "search"
  },
  {
    "type": "get",
    "url": "/search/faction/:factionName/",
    "title": "Search for a Faction",
    "version": "0.1.2",
    "name": "findFaction",
    "group": "search",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "factionName",
            "description": "<p>Partial Strings are accepted</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/search/faction/:factionName/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "search"
  },
  {
    "type": "get",
    "url": "/search/item/:itemName/",
    "title": "Search for an Item",
    "version": "0.1.2",
    "name": "findItem",
    "group": "search",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "itemName",
            "description": "<p>Partial Strings are accepted</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/search/item/:itemName/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "search"
  },
  {
    "type": "get",
    "url": "/search/region/:regionName/",
    "title": "Search for a Region",
    "version": "0.1.2",
    "name": "findRegion",
    "group": "search",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "regionName",
            "description": "<p>Partial Strings are accepted</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/search/region/:regionName/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "search"
  },
  {
    "type": "get",
    "url": "/search/system/:systemName/",
    "title": "Search for a System",
    "version": "0.1.2",
    "name": "findSystem",
    "group": "search",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "systemName",
            "description": "<p>Partial Strings are accepted</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/search/system/:systemName/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "search"
  },
  {
    "type": "get",
    "url": "/search/",
    "title": "List the endpoints available for the search api",
    "version": "0.1.2",
    "name": "index",
    "group": "search",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/search/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "search"
  },
  {
    "type": "get",
    "url": "/currentlyActiveAlliances/",
    "title": "List the amount of currently active alliances",
    "version": "0.1.2",
    "name": "currentlyActiveAlliances",
    "group": "stats",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/stats/currentlyActiveAlliances/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "stats"
  },
  {
    "type": "get",
    "url": "/currentlyActiveCharacters/",
    "title": "List the amount of currently active characters",
    "version": "0.1.2",
    "name": "currentlyActiveCharacters",
    "group": "stats",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/stats/currentlyActiveCharacters/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "stats"
  },
  {
    "type": "get",
    "url": "/currentlyActiveCorporations/",
    "title": "List the amount of currently active corporations",
    "version": "0.1.2",
    "name": "currentlyActiveCorporations",
    "group": "stats",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/stats/currentlyActiveCorporations/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "stats"
  },
  {
    "type": "get",
    "url": "/currentlyActiveShipTypes/",
    "title": "List the amount of currently active ship types",
    "version": "0.1.2",
    "name": "currentlyActiveShipTypes",
    "group": "stats",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/stats/currentlyActiveShipTypes/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "stats"
  },
  {
    "type": "get",
    "url": "/currentlyActiveSolarSystems/",
    "title": "List the amount of currently active solar systems",
    "version": "0.1.2",
    "name": "currentlyActiveSolarSystems",
    "group": "stats",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/stats/currentlyActiveSolarSystems/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "stats"
  },
  {
    "type": "get",
    "url": "/stats/",
    "title": "List the endpoints available for the stats api",
    "version": "0.1.2",
    "name": "index",
    "group": "stats",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/stats/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "stats"
  },
  {
    "type": "get",
    "url": "/mostValuableKillsLast7Days/",
    "title": "List the most valuable kills done over the last 7 days",
    "version": "0.1.2",
    "name": "mostValuableKillsLast7Days",
    "group": "stats",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/stats/mostValuableKillsLast7Days/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "stats"
  },
  {
    "type": "get",
    "url": "/sevenDayKillCount/",
    "title": "List the amount of kills done over the last 7 days",
    "version": "0.1.2",
    "name": "sevenDayKillCount",
    "group": "stats",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/stats/sevenDayKillCount/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "stats"
  },
  {
    "type": "get",
    "url": "/top10Alliances/",
    "title": "List the top10 Alliances",
    "version": "0.1.2",
    "name": "top10Alliances",
    "group": "stats",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/stats/top10Alliances/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "stats"
  },
  {
    "type": "get",
    "url": "/top10Characters/",
    "title": "List the top10 Characters",
    "version": "0.1.2",
    "name": "top10Characters",
    "group": "stats",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/stats/top10Characters/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "stats"
  },
  {
    "type": "get",
    "url": "/top10Corporations/",
    "title": "List the top10 Corporations",
    "version": "0.1.2",
    "name": "top10Corporations",
    "group": "stats",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/stats/top10Corporations/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "stats"
  },
  {
    "type": "get",
    "url": "/top10Regions/",
    "title": "List the top10 Regions",
    "version": "0.1.2",
    "name": "top10Regions",
    "group": "stats",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/stats/top10Regions/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "stats"
  },
  {
    "type": "get",
    "url": "/top10ShipTypes/",
    "title": "List the top10 Ship Types",
    "version": "0.1.2",
    "name": "top10ShipTypes",
    "group": "stats",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/stats/top10ShipTypes/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "stats"
  },
  {
    "type": "get",
    "url": "/top10SolarSystems/",
    "title": "List the top10 Solar Systems",
    "version": "0.1.2",
    "name": "top10SolarSystems",
    "group": "stats",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/stats/top10SolarSystems/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "stats"
  },
  {
    "type": "get",
    "url": "/system/find/:systemName/",
    "title": "Find a system",
    "version": "0.1.2",
    "name": "Find",
    "group": "system",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "systemName",
            "description": "<p>the systemName</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/system/find/:systemName/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "system"
  },
  {
    "type": "get",
    "url": "/system/information/:systemID/",
    "title": "Show information for a single system",
    "version": "0.1.2",
    "name": "Information",
    "group": "system",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "systemID",
            "description": "<p>the systemID</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/system/information/:systemID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "system"
  },
  {
    "type": "get",
    "url": "/system/",
    "title": "List the endpoints available for the system api",
    "version": "0.1.2",
    "name": "index",
    "group": "system",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/system/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "system"
  },
  {
    "type": "post",
    "url": "/tools/calculateCrestHash/",
    "title": "Calculates the CREST hash for a non-crest verified killmail, remember to post to it using a CREST formatted killmail",
    "version": "0.1.2",
    "name": "calculateCrestHash",
    "group": "tools",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "json",
            "optional": false,
            "field": "killmailData",
            "description": "<p>The killmail data as a json string</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Post-Example:",
          "content": "{\"killID\":1,\"killmail\":[]}",
          "type": "json"
        }
      ]
    },
    "sampleRequest": [
      {
        "url": "/api/tools/calculateCrestHash"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "tools"
  },
  {
    "type": "get",
    "url": "/tools/",
    "title": "List the endpoints available for the tools api",
    "version": "0.1.2",
    "name": "index",
    "group": "tools",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/tools/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "tools"
  },
  {
    "type": "get",
    "url": "/wars/",
    "title": "List the endpoints available for the wars api",
    "version": "0.1.2",
    "name": "index",
    "group": "wars",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/wars/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "wars"
  },
  {
    "type": "get",
    "url": "/wars/kills/:warID/",
    "title": "List all the kills done in a war",
    "version": "0.1.2",
    "name": "kills",
    "group": "wars",
    "permission": [
      {
        "name": "public"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "warID",
            "description": "<p>the ID of the war to lookup kills for</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/wars/kills/:warID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "wars"
  },
  {
    "type": "get",
    "url": "/wars/wars/",
    "title": "List all the wars",
    "version": "0.1.2",
    "name": "wars",
    "group": "wars",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/wars/wars/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "wars"
  }
] });
