var options = {
  url: "COMPONENTS/fetchFromServer.php",
  getValue : "name",
  theme: "dark",

  template: {
		type: "description",
		fields: {
			description: "artist"
		}
	},

	list: {
    match: {
			enabled: true
		},

		showAnimation: {
			type: "fade", //normal|slide|fade
			time: 400,
		},

		hideAnimation: {
			type: "fade", //normal|slide|fade
			time: 400,
    }
	}
};
$("#search").easyAutocomplete(options);
