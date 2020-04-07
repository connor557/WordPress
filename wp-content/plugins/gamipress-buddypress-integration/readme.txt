=== GamiPress - BuddyPress integration ===
Contributors: gamipress, tsunoa, rubengc, eneribs
Tags: gamipress, gamification, gamify, point, achievement, badge, award, reward, credit, engagement, ajax, buddypress, bp, social networking, activity, profile, messaging, friend, group, forum, notification, settings, social, community, network, networking
Requires at least: 4.4
Tested up to: 5.4
Stable tag: 1.3.6
License: GNU AGPLv3
License URI:  http://www.gnu.org/licenses/agpl-3.0.html

Connect GamiPress with BuddyPress

== Description ==

Gamify your [BuddyPress](http://wordpress.org/plugins/buddypress/ "BuddyPress") community thanks to the powerful gamification plugin, [GamiPress](https://wordpress.org/plugins/gamipress/ "GamiPress")!

This plugin automatically connects GamiPress with BuddyPress adding new activity events and features.

= New Events =

* Account activation: When an user account get activated.
* Profile updates: When an user changes their profile information (avatar, cover image and/or just the profile information).

= Friendship Events =

* Send friendship request: When an user request to another to become friends.
* Accept a friendship request: When an user accepts the friendship request from another one.
* Get a friendship request accepted: When an user gets a friendship request accepted from another one.

= Message Events =

* Send/Reply private messages: When an user sends or replies to private messages.

= Activity Stream Events =

* Activity stream messages: When an user publish new activity stream messages.
* Reply activity stream messages: When an user replies to an activity stream message.
* Favorite activity stream messages: When an user favorites an activity stream message.
* Remove a favorite on an activity stream item: When an user removes a favorite on an activity stream message.
* Get a favorite on an activity stream item: When an user gets a new favorite on an activity stream message.
* Get a favorite removed from an activity stream item: When an user gets a favorite removed on an activity stream message.

= Group Events =

* Group activity stream messages: When a group publish new activity stream messages.
* Create a group: When an user creates a new group.
* Join a group: When an user joins a group.
* Join a specific group: When an user joins a specific group.
* Get accepted on a private group: When an user gets accepted on a private group.
* Get accepted on a specific private group: When an user gets accepted on a specific private group.
* Group invitations: When an user invites someone to join a group.
* Group promotions: When an user get promoted or promotes another one as group moderator/administrator.

= New Features =

* Drag and drop settings to select which points types, achievement types and/or rank types should be displayed on user frontend profiles and in what order.
* Setting to select which elements should be displayed in activity streams.

There are more add-ons that improves your experience with GamiPress and BuddyPress:

* [BuddyPress Group Leaderboard](https://wordpress.org/plugins/gamipress-buddypress-group-leaderboard/)

== Installation ==

= From WordPress backend =

1. Navigate to Plugins -> Add new.
2. Click the button "Upload Plugin" next to "Add plugins" title.
3. Upload the downloaded zip file and activate it.

= Direct upload =

1. Upload the downloaded zip file into your `wp-content/plugins/` folder.
2. Unzip the uploaded zip file.
3. Navigate to Plugins menu on your WordPress admin area.
4. Activate this plugin.

== Frequently Asked Questions ==

= How can I manage the tabs displayed on user profiles? =

You will find all the settings to manage the tabs displayed by navigating to GamiPress -> Settings -> Add-ons -> BuddyPress Settings.

= How can I display user earnings on BuddyPress activity feed? =

On each type edit screen (points type, achievement type and rank type) you will find setting to manage which elements display on BuddyPress activity feed.

== Screenshots ==

1. Show user points, achievements and ranks on frontend profile

== Changelog ==

= 1.3.6 =

* **Improvements**
* Added an explanatory text about the possibility of reorder type by dragging and dropping them.
* Ensure to always setup the current user to option to no on elements displayed on user profiles.

= 1.3.5 =

* **New Features**
* New event: Get a friendship accepted.
* New event: Remove a favorite on an activity stream item.
* New event: Get a favorite removed from an activity stream item.
* **Bug Fixes**
* Correctly award to the friend user on "Accept a friendship" event.

= 1.3.4 =

* **Bug Fixes**
* Improved achievement type detection when displaying acheivements on a sub-tab.

= 1.3.3 =

* **Improvements**
* Code cleanup removing debug and old code.

= 1.3.2 =

* **Improvements**
* Improved rank activity feed detection.

= 1.3.1 =

* **Improvements**
* Avoid to grant access to any event on duplicity checks.

= 1.3.0 =

* **Bug Fixes**
* Fixed tab settings default value that forces to get it back to tab when choose to not display.
* **Improvements**
* Moved old changelog to changelog.txt file.
