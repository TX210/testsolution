$(document).ready(function () {
    $("#company_add").click(function () {
        var name = $("#company_name").val();
        var money = $("#company_money").val();
        var parent = $("#company_parent").val();
        $.post("ajax/company_add.php", {
            name: name,
            money: money,
            parent: parent
        }).done(function (data) {
            $("#company_view").click();
        });    
    });
    $("#company_view").click(function () {
        $.post("ajax/companies_get.php", {}).done(function (data) {
            $("#main-row").empty();
            var json = JSON.parse(data);
            var max_level = 0;
            for (i = 0; i < Object.keys(json).length; i++) {
                if (max_level < json[i][5]) {
                    max_level = +json[i][5]
                }
            } 
            for (j = max_level; j > 0; j--) {
                for (i = 0; i < Object.keys(json).length; i++) {
                    if (j == json[i][5]) {
                        for (k = 0; k < Object.keys(json).length; k++) {
                            if (json[i][4] == json[k][0]) {
                                json[k][3] = Number(json[k][3]) + Number(json[i][3]);
                            }
                        }
                    }
                }
            }             
            for (j = 0; j < max_level + 1; j++) {
                for (i = 0; i < Object.keys(json).length; i++) {
                    
                    var parent_card = "<div class=\"col s12 l4 offset-l4\"><div class=\"card\"><div class=\"card-content\" id=\"" + json[i][0] + "\"><span class=\"card-title\">" + json[i][1] + " "+ json[i][2]+"K "+json[i][3]+"K"+"<a class=\"waves-effect waves-teal btn-flat edit\" id=\"edit_" + json[i][0] + "\">edit<id>_"+ json[i][0] +"_</id></a><a class=\"waves-effect waves-teal btn-flat delete\" id=\"delete_" + json[i][0] + "\">delete<id>_"+ json[i][0] +"_</id></a></span></div></div></div>";
                    var child_card = "<div class=\"row\"><div class=\"col s12\"><div class=\"card\"><div class=\"card-content\" id=\"" + json[i][0] + "\"><span class=\"card-title\">" + json[i][1] + " "+ json[i][2]+"K "+json[i][3]+"K"+"<a class=\"waves-effect waves-teal btn-flat edit\" id=\"edit_" + json[i][0] + "\">edit<id>_"+ json[i][0] +"_</id></a><a class=\"waves-effect waves-teal btn-flat delete\" id=\"delete_" + json[i][0] + "\">delete<id>_"+ json[i][0] +"_</id></a></span></div></div></div></div>";
                    if (json[i][5] == j) {
                        if (json[i][5] > 0) {
                            $("#" + json[i][4]).append(child_card);
                        } else {
                            $("#main-row").append(parent_card);
                        }
                    }
                }
            }
        });
    });
    $("body").on("click", ".edit", function(){
        var id = this.innerHTML.split("_");
        var name = $("#company_name").val();
        var money = $("#company_money").val();
        $.post("ajax/company_edit.php", {
            name: name,
            money: money,
            id: id[1]
        }).done(function (data) {
            $("#company_view").click();
        });
    });
    $("body").on("click", ".delete", function(){
        var id = this.innerHTML.split("_");
        $.post("ajax/company_delete.php", {
            id: id[1],
        }).done(function (data) {
            $("#company_view").click();
        });
    });
});