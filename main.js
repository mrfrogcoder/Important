var featuredContents = [
    {
        "id": 1,
        "title": "Hello1",
        "description": "Loremipsumdoloripsitlol",
        "image": "./",
        "counterL": 5,
        "counterE": 3
    },
    {
        "id": 2,
        "title": "Hello2",
        "description": "asdasdasdasd",
        "image": "./",
        "counterL": 15,
        "counterE": 30
    },
    {
        "id": 3,
        "title": "Hello2",
        "description": "Loremipsumdolorasdasdasdipsitlol",
        "image": "./",
        "counterL": 15,
        "counterE": 30
    },
    {
        "id": 4,
        "title": "Hello2",
        "description": "asdasdsad",
        "image": "./",
        "counterL": 15,
        "counterE": 30
    },
    {
        "id": 5,
        "title": "Hello2",
        "description": "asdasd",
        "image": "./",
        "counterL": 15,
        "counterE": 30
    },
    {
        "id": 6,
        "title": "Hello2",
        "description": "asdasd",
        "image": "./",
        "counterL": 15,
        "counterE": 30
    },
    {
        "id": 12312312312444,
        "title": "Hello2",
        "description": "asdasd",
        "image": "./",
        "counterL": 15,
        "counterE": 30
    },
    {
        "id": 123123123,
        "title": "Hello2",
        "description": "asdasd",
        "image": "./",
        "counterL": 15,
        "counterE": 30
    },
    {
        "id": 123123234444,
        "title": "Hello2",
        "description": "asdasd",
        "image": "./",
        "counterL": 15,
        "counterE": 30
    },
    {
        "id":12312312313,
        "title": "Hello2",
        "description": "asdasd",
        "image": "./",
        "counterL": 15,
        "counterE": 30
    },
    {
        "id": 12344123,
        "title": "Hello2",
        "description": "asdasd",
        "image": "./",
        "counterL": 15,
        "counterE": 30
    },
    {
        "id": 333,
        "title": "Hello2",
        "description": "asdasd",
        "image": "./",
        "counterL": 15,
        "counterE": 30
    },
    {
        "id": 123,
        "title": "Hello2",
        "description": "asdasd",
        "image": "./",
        "counterL": 15,
        "counterE": 30
    },
    {
        "id": 4242,
        "title": "Hello2",
        "description": "asdasd",
        "image": "./",
        "counterL": 15,
        "counterE": 30
    },
    {
        "id": 123,
        "title": "Hello2",
        "description": "asdasd",
        "image": "./",
        "counterL": 15,
        "counterE": 30
    }
];

    var i = 0;
    var by3 = 3;
    var by4 = 4;
    var viewModel = {
        myMessage: ko.observable(), // Initially blank
        price: ko.observable(400),
        items: ['apple', 'banana', 'mango'],
        buyer: { name: 'Franklin', credits: 250 },
        seller: { name: 'Mario', credits: 5800 },
        feature: ko.observableArray(featuredContents)
    };



    viewModel.templatoUse = function (item) {
        var tmplName = 'f4x4-template';
        i = i + 1;
        /*
        if (x < by3 && x != by4) {
        console.log(item.id, true);
        if (by3 == 3) {
        by3 = by4;
        }

        } else if (x > by4 && x != by3) {
        console.log(item.id, false);
        if (by4 == 4) {
        by3 = by4;
        }
        }*/
        if (i % by4 > 0) {
            console.log(3, i);

        } else {
            console.log(4, i);
        }



        return tmplName;
    }


viewModel.myMessage("Hello, world!"); // Text appears

viewModel.priceRating = ko.computed(function () {
    return this.price() > 50 ? "expensive" : "affordable";
}, viewModel);

viewModel.details ="<em>For further details, view the report <a href='report.html'>here</a>.</em>";

viewModel.customClass = 'makeBlue';




ko.applyBindings(viewModel);
