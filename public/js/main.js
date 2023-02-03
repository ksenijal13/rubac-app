var workflow = 2;
$(document).ready(function(){
    $("#users-link").click(showUsers);
    $("#settings-link").click(showSettings);
});

function showUsers(e){
    e.preventDefault();
   
    $.ajax({
        url: "/admin/users",
        method: "get",
        dataType: "json",
        data: {
                "WorkflowID": workflow,
                "WorkflowName": "Allow only specific IP for ADMIN role",
                "Path": "/admin/*",
                "Params": [
                {
                "Name": "ip_address",
                "Expression": "$request.getIpAddress"
                },
                {
                "Name": "user_role",
                "Expression": "$user.getRole"
                }
                ],
                "Rules": [
                {
                "RuleName": "Allow only specific IP",
                "Expression": "$ip_address == '100.100.100.100'"
                },
                {
                "RuleName": "Check role",
                "Expression": "$user_role == 'ADMIN'"
                }
                ]
        },
        success: function(data){
            window.location.href = '/admin/users';
        },
        error: function(jqXHR, exception){
                alert("Nemate prava pristupa.");
            }
        })
}

function showSettings(e){
    e.preventDefault();
   
    $.ajax({
        url: "/admin/settings",
        method: "get",
        dataType: "json",
        data: {
                "WorkflowID": workflow,
                "WorkflowName": "Allow only specific IP for ADMIN role",
                "Path": "/admin/*",
                "Params": [
                {
                "Name": "ip_address",
                "Expression": "$request.getIpAddress"
                },
                {
                "Name": "user_role",
                "Expression": "$user.getRole"
                }
                ],
                "Rules": [
                {
                "RuleName": "Allow only specific IP",
                "Expression": "$ip_address == '100.100.100.100'"
                },
                {
                "RuleName": "Check role",
                "Expression": "$user_role == 'ADMIN'"
                }
                ]
        },
        success: function(data){
            window.location.href = '/admin/settings';
        },
        error: function(jqXHR, exception){
                alert("Nemate prava pristupa.");
            }
        })
}