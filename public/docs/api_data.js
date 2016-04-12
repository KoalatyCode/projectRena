define({ "api": [
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
    "url": "/alliance/count/",
    "title": "Total amount of alliances in the system",
    "version": "0.1.2",
    "name": "count",
    "group": "alliance",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/alliance/count/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "alliance"
  },
  {
    "type": "get",
    "url": "/celestial/information/:solarSystemID/",
    "title": "Show all celestials in a system",
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
    "url": "/character/count/",
    "title": "Total amount of characters in the system",
    "version": "0.1.2",
    "name": "count",
    "group": "character",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/character/count/"
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
    "url": "/corporation/count/",
    "title": "Total amount of corporations in the system",
    "version": "0.1.2",
    "name": "count",
    "group": "corporation",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/corporation/count/"
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
    "url": "/killlist/10b/",
    "title": "Show the last 100 kills with a value of minimum 10b isk",
    "version": "0.1.2",
    "name": "10b",
    "group": "killlist",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/killlist/10b/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "killlist"
  },
  {
    "type": "get",
    "url": "/killlist/5b/",
    "title": "Show the last 100 kills with a value of minimum 5b isk",
    "version": "0.1.2",
    "name": "5b",
    "group": "killlist",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/killlist/5b/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "killlist"
  },
  {
    "type": "get",
    "url": "/killlist/bigkills/",
    "title": "Show the last 100 big kills (>5b in value)",
    "version": "0.1.2",
    "name": "bigkills",
    "group": "killlist",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/killlist/bigkills/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "killlist"
  },
  {
    "type": "get",
    "url": "/killlist/capitals/",
    "title": "Show the latest carrier kills",
    "description": "<p>FAX machines fall into this one aswell</p>",
    "version": "0.1.2",
    "name": "capitals",
    "group": "killlist",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/killlist/capitals/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "killlist"
  },
  {
    "type": "get",
    "url": "/killlist/freighters/",
    "title": "Show the latest freighter kills",
    "description": "<p>Rorq and Orca fall into this one aswell</p>",
    "version": "0.1.2",
    "name": "freighters",
    "group": "killlist",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/killlist/freighters/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "killlist"
  },
  {
    "type": "get",
    "url": "/killlist/highsec/",
    "title": "Show the last 100 kills done in high security space",
    "version": "0.1.2",
    "name": "highsec",
    "group": "killlist",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/killlist/highsec/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "killlist"
  },
  {
    "type": "get",
    "url": "/killlist/latest/",
    "title": "Shows the 100 latest killmails",
    "version": "0.1.2",
    "name": "kill",
    "group": "killlist",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/killlist/latest/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "killlist"
  },
  {
    "type": "get",
    "url": "/killlist/lowsec/",
    "title": "Show the last 100 kills done in low security space",
    "version": "0.1.2",
    "name": "lowsec",
    "group": "killlist",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/killlist/lowsec/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "killlist"
  },
  {
    "type": "get",
    "url": "/killlist/nullsec/",
    "title": "Show the last 100 kills done in null security space",
    "version": "0.1.2",
    "name": "nullsec",
    "group": "killlist",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/killlist/nullsec/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "killlist"
  },
  {
    "type": "get",
    "url": "/killlist/solo/",
    "title": "Show the last 100 solo kills",
    "version": "0.1.2",
    "name": "solo",
    "group": "killlist",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/killlist/solo/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "killlist"
  },
  {
    "type": "get",
    "url": "/killlist/supercarriers/",
    "title": "Show the latest super carrier kills",
    "version": "0.1.2",
    "name": "supercarriers",
    "group": "killlist",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/killlist/supercarriers/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "killlist"
  },
  {
    "type": "get",
    "url": "/killlist/titans/",
    "title": "Show the latest titan kills",
    "version": "0.1.2",
    "name": "titans",
    "group": "killlist",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/killlist/titans/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "killlist"
  },
  {
    "type": "get",
    "url": "/killlist/wspace/",
    "title": "Show the last 100 kills done in Wormhole space",
    "version": "0.1.2",
    "name": "wspace",
    "group": "killlist",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/killlist/wspace/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "killlist"
  },
  {
    "type": "get",
    "url": "/killmail/count/",
    "title": "Total amount of kills in the system",
    "version": "0.1.2",
    "name": "count",
    "group": "killmail",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/killmail/count/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "killmail"
  },
  {
    "type": "get",
    "url": "/killmail/kill/:killID/",
    "title": "List a single killmails data",
    "version": "0.1.2",
    "name": "killmail",
    "group": "killmail",
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
        "url": "/api/killmail/kill/:killID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "killmail"
  },
  {
    "type": "get",
    "url": "/kills/afterDate/:afterDate/",
    "title": "List kills happening after a certain date",
    "version": "0.1.2",
    "name": "afterDate",
    "group": "kills",
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
            "field": "corporationID",
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
        "url": "/api/kills/afterDate/:afterDate/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kills"
  },
  {
    "type": "get",
    "url": "/kills/alliance/:allianceID/",
    "title": "List kills for a certain alliance",
    "version": "0.1.2",
    "name": "alliance",
    "group": "kills",
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
            "field": "corporationID",
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
        "url": "/api/kills/alliance/:allianceID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kills"
  },
  {
    "type": "get",
    "url": "/kills/beforeDate/:beforeDate/",
    "title": "List kills happening before a certain date",
    "version": "0.1.2",
    "name": "beforeDate",
    "group": "kills",
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
            "field": "corporationID",
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
        "url": "/api/kills/beforeDate/:beforeDate/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kills"
  },
  {
    "type": "get",
    "url": "/kills/betweenDates/:afterDate/:beforeDate/",
    "title": "List kills between two dates",
    "version": "0.1.2",
    "name": "betweenDates",
    "group": "kills",
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
            "field": "corporationID",
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
        "url": "/api/kills/betweenDates/:afterDate/:beforeDate/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kills"
  },
  {
    "type": "get",
    "url": "/kills/character/:characterID/",
    "title": "List kills for a certain character",
    "version": "0.1.2",
    "name": "character",
    "group": "kills",
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
            "field": "corporationID",
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
        "url": "/api/kills/character/:characterID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kills"
  },
  {
    "type": "get",
    "url": "/kills/corporation/:corporationID/",
    "title": "List kills for a certain corporation",
    "version": "0.1.2",
    "name": "corporation",
    "group": "kills",
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
        "url": "/api/kills/corporation/:corporationID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kills"
  },
  {
    "type": "get",
    "url": "/kills/faction/:factionID/",
    "title": "List kills for a certain faction",
    "version": "0.1.2",
    "name": "faction",
    "group": "kills",
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
            "field": "corporationID",
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
        "url": "/api/kills/faction/:factionID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kills"
  },
  {
    "type": "get",
    "url": "/kills/group/:groupID/",
    "title": "List kills for a certain group",
    "version": "0.1.2",
    "name": "group",
    "group": "kills",
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
            "field": "corporationID",
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
        "url": "/api/kills/group/:groupID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kills"
  },
  {
    "type": "get",
    "url": "/kills/region/:regionID/",
    "title": "List kills that has happened in a certain region",
    "version": "0.1.2",
    "name": "region",
    "group": "kills",
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
            "field": "corporationID",
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
        "url": "/api/kills/region/:regionID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kills"
  },
  {
    "type": "get",
    "url": "/kills/shipType/:shipTypeID/",
    "title": "List kills for a certain shipType",
    "version": "0.1.2",
    "name": "shipType",
    "group": "kills",
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
            "field": "corporationID",
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
        "url": "/api/kills/shipType/:shipTypeID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kills"
  },
  {
    "type": "get",
    "url": "/kills/solarSystem/:solarSystemID/",
    "title": "List kills that has happened in a certain solar system",
    "version": "0.1.2",
    "name": "solarSystem",
    "group": "kills",
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
            "field": "corporationID",
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
        "url": "/api/kills/solarSystem/:solarSystemID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kills"
  },
  {
    "type": "get",
    "url": "/kills/vGroup/:vGroupID/",
    "title": "List kills for a certain vGroup",
    "version": "0.1.2",
    "name": "vGroup",
    "group": "kills",
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
            "field": "corporationID",
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
        "url": "/api/kills/vGroup/:vGroupID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kills"
  },
  {
    "type": "get",
    "url": "/kills/weaponType/:weaponTypeID/",
    "title": "List kills for a certain weaponType",
    "version": "0.1.2",
    "name": "weaponType",
    "group": "kills",
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
            "field": "corporationID",
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
        "url": "/api/kills/weaponType/:weaponTypeID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "kills"
  },
  {
    "type": "get",
    "url": "/losses/afterDate/:afterDate/",
    "title": "List losses happening after a certain date",
    "version": "0.1.2",
    "name": "afterDate",
    "group": "losses",
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
            "field": "corporationID",
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
        "url": "/api/losses/afterDate/:afterDate/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "losses"
  },
  {
    "type": "get",
    "url": "/losses/alliance/:allianceID/",
    "title": "List losses for a certain alliance",
    "version": "0.1.2",
    "name": "alliance",
    "group": "losses",
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
            "field": "corporationID",
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
        "url": "/api/losses/alliance/:allianceID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "losses"
  },
  {
    "type": "get",
    "url": "/losses/beforeDate/:beforeDate/",
    "title": "List losses happening before a certain date",
    "version": "0.1.2",
    "name": "beforeDate",
    "group": "losses",
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
            "field": "corporationID",
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
        "url": "/api/losses/beforeDate/:beforeDate/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "losses"
  },
  {
    "type": "get",
    "url": "/losses/betweenDates/:afterDate/:beforeDate/",
    "title": "List losses between two dates",
    "version": "0.1.2",
    "name": "betweenDates",
    "group": "losses",
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
            "field": "corporationID",
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
        "url": "/api/losses/betweenDates/:afterDate/:beforeDate/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "losses"
  },
  {
    "type": "get",
    "url": "/losses/character/:characterID/",
    "title": "List losses for a certain character",
    "version": "0.1.2",
    "name": "character",
    "group": "losses",
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
            "field": "corporationID",
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
        "url": "/api/losses/character/:characterID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "losses"
  },
  {
    "type": "get",
    "url": "/losses/corporation/:corporationID/",
    "title": "List losses for a certain corporation",
    "version": "0.1.2",
    "name": "corporation",
    "group": "losses",
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
        "url": "/api/losses/corporation/:corporationID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "losses"
  },
  {
    "type": "get",
    "url": "/losses/faction/:factionID/",
    "title": "List losses for a certain faction",
    "version": "0.1.2",
    "name": "faction",
    "group": "losses",
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
            "field": "corporationID",
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
        "url": "/api/losses/faction/:factionID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "losses"
  },
  {
    "type": "get",
    "url": "/losses/group/:groupID/",
    "title": "List losses for a certain group",
    "version": "0.1.2",
    "name": "group",
    "group": "losses",
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
            "field": "corporationID",
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
        "url": "/api/losses/group/:groupID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "losses"
  },
  {
    "type": "get",
    "url": "/losses/shipType/:shipTypeID/",
    "title": "List losses for a certain shipType",
    "version": "0.1.2",
    "name": "shipType",
    "group": "losses",
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
            "field": "corporationID",
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
        "url": "/api/losses/shipType/:shipTypeID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "losses"
  },
  {
    "type": "get",
    "url": "/losses/vGroup/:vGroupID/",
    "title": "List losses for a certain vGroup",
    "version": "0.1.2",
    "name": "vGroup",
    "group": "losses",
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
            "field": "corporationID",
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
        "url": "/api/losses/vGroup/:vGroupID/"
      }
    ],
    "filename": "config/routes/api.php",
    "groupTitle": "losses"
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
    "url": "/search/:searchTerm/",
    "title": "Do a multi-search, looking into every category",
    "version": "0.1.2",
    "name": "findAny",
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
            "field": "searchTerm",
            "description": "<p>A String to try and match to..</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/search/any/:searchTerm/"
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
    "success": {
      "examples": [
        {
          "title": "Example Return",
          "content": "66e1b9f27b9ce0947051240f2f594b74957fc30b",
          "type": "string"
        }
      ]
    },
    "filename": "config/routes/api.php",
    "groupTitle": "tools"
  },
  {
    "type": "get",
    "url": "/wars/count/",
    "title": "Total amount of wars in the system",
    "version": "0.1.2",
    "name": "count",
    "group": "wars",
    "permission": [
      {
        "name": "public"
      }
    ],
    "sampleRequest": [
      {
        "url": "/api/wars/count/"
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
