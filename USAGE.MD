Login into /login 
with params username,password returns 
{
"success":"1",
"username":"something",
"name":"full name",
"allowtrackall":"0",
"allowtrackfriends":"1",
}
{"result":"n"} n: 0=success,1=invalid params,2=invalid credentials


SignUp into /signup with params username,password,allowtrackall,allowtrackfriends return int: 0


status=
0:not friends
1:1 has sent fr
2:2 has sent fr
3:friends

friendrequestsendhandler
posts (user1,user2)
recieves(
0:ok sent
1:alreadysent
2:already friends
3:now friends(he had sent)
4:error
)