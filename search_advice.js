function SearchSuggest(searchFuc) {
    var input = $('#searchtext');
    var suggestWrap = $('#searchsuggest');
    var key = "";
    var init = function () {
        input.bind('keyup', sendKeyWord);
        input.bind('blur', function () {
            setTimeout(hideSuggest, 100);
        })
    };
    var hideSuggest = function () {
        suggestWrap.hide();
    };
    var sendKeyWord = function (event) {
        var valText = $.trim(input.val());
        if (valText == '' || valText == key) {
            return;
        }
        searchFuc(valText);
        key = valText;
    };
    this.dataDisplay = function (data) {
        if (data.length <= 0) {
            suggestWrap.hide();
            return;
        }
        var li;
        var tmpFrag = document.createDocumentFragment();
        suggestWrap.find('ul').html('<li>您要找的是不是:</li>');
        for (var i = 0; i < data.length; i++) {
            a=document.createElement('A');
            a.href="./view_item.php?id="+data[i].id;
            a.innerHTML=data[i].goodsname;
            li = document.createElement('LI');
            li.appendChild(a);
            tmpFrag.appendChild(li);
        }
        suggestWrap.find('ul').append(tmpFrag);
        suggestWrap.show();
        suggestWrap.find('li').hover(function () {
            suggestWrap.find('li').removeClass('hover');
            $(this).addClass('hover');

        }, function () {
            $(this).removeClass('hover');
        }).bind('click', function () {
            input.val(this.innerHTML);

            suggestWrap.hide();
        });
    };
    init();
}
var searchSuggest;
function sendKeyWordToBack(keyword) {
    var obj = {
        "keyword": keyword
    };
    $.ajax({
        type: "GET",
        url: "./search_advice.php",
        async: true,
        data: obj,
        dataType: "json",
        success: function (data) {
            var aData = [];
            for (var i = 0; i < data.length; i++) {
                var dataobj={};
                dataobj.title=data[i]["title"];
                dataobj.id=data[i]["id"];
                aData.push(dataobj);
            }
            searchSuggest.dataDisplay(aData);
        }
    });
}
window.onload = function () {
    searchSuggest = new SearchSuggest(sendKeyWordToBack);
}
