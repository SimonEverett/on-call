import-module ac*

php.exe C:\inetpub\wwwroot\Import_student.php clear_student_year_groups

Get-ADUser -Filter * -SearchBase "OU=Staff Users,OU=Bemrose School Users,DC=bemrose,DC=local" -Properties *  | Export-Csv -NoType "C:\inetpub\wwwroot\csv\staff.csv" 
php.exe C:\inetpub\wwwroot\Import_staff.php C:\inetpub\wwwroot\csv\staff.csv >  C:\inetpub\wwwroot\log\staff.txt

Get-ADUser -Filter * -SearchBase "OU=Year 7,OU=Student Users,OU=Bemrose School Users,DC=bemrose,DC=local" -Properties DisplayName, SamAccountName | Export-Csv -NoType "C:\inetpub\wwwroot\csv\year7.csv"  
php.exe C:\inetpub\wwwroot\Import_student.php C:\inetpub\wwwroot\csv\year7.csv  7  >  C:\inetpub\wwwroot\log\year7.txt

Get-ADUser -Filter * -SearchBase "OU=Year 8,OU=Student Users,OU=Bemrose School Users,DC=bemrose,DC=local" -Properties DisplayName, SamAccountName | Export-Csv -NoType "C:\inetpub\wwwroot\csv\year8.csv" 
php.exe C:\inetpub\wwwroot\Import_student.php C:\inetpub\wwwroot\csv\year8.csv  8  >  C:\inetpub\wwwroot\log\year8.txt

Get-ADUser -Filter * -SearchBase "OU=Year 9,OU=Student Users,OU=Bemrose School Users,DC=bemrose,DC=local" -Properties DisplayName, SamAccountName | Export-Csv -NoType "C:\inetpub\wwwroot\csv\year9.csv" 
php.exe C:\inetpub\wwwroot\Import_student.php C:\inetpub\wwwroot\csv\year9.csv  9  >  C:\inetpub\wwwroot\log\year9.txt

Get-ADUser -Filter * -SearchBase "OU=Year 10,OU=Student Users,OU=Bemrose School Users,DC=bemrose,DC=local" -Properties DisplayName, SamAccountName | Export-Csv -NoType "C:\inetpub\wwwroot\csv\year10.csv" 
php.exe C:\inetpub\wwwroot\Import_student.php C:\inetpub\wwwroot\csv\year10.csv  10 >  C:\inetpub\wwwroot\log\year10.txt

Get-ADUser -Filter * -SearchBase "OU=Year 11,OU=Student Users,OU=Bemrose School Users,DC=bemrose,DC=local" -Properties DisplayName, SamAccountName | Export-Csv -NoType "C:\inetpub\wwwroot\csv\year11.csv" 
php.exe C:\inetpub\wwwroot\Import_student.php C:\inetpub\wwwroot\csv\year11.csv  11 >  C:\inetpub\wwwroot\log\year11.txt

Get-ADUser -Filter * -SearchBase "OU=Year 12,OU=Student Users,OU=Bemrose School Users,DC=bemrose,DC=local" -Properties DisplayName, SamAccountName | Export-Csv -NoType "C:\inetpub\wwwroot\csv\year12.csv" 
php.exe C:\inetpub\wwwroot\Import_student.php C:\inetpub\wwwroot\csv\year12.csv  12 >  C:\inetpub\wwwroot\log\year12.txt

Get-ADUser -Filter * -SearchBase "OU=Year 13,OU=Student Users,OU=Bemrose School Users,DC=bemrose,DC=local" -Properties DisplayName, SamAccountName | Export-Csv -NoType "C:\inetpub\wwwroot\csv\year13.csv" 
php.exe C:\inetpub\wwwroot\Import_student.php C:\inetpub\wwwroot\csv\year13.csv  13 >  C:\inetpub\wwwroot\log\year13.txt