<html>

<head>
    <script>
        async function getDataFromAPI() {
            let response = await fetch('http://202.44.40.193/~aws/JSON/priv_hos.json')
            let rawData = await response.text()
            let objectData = JSON.parse(rawData)

            let result = document.getElementById('result')



            for (let i = 0; i < objectData.features.length; i++) {

               let tab =document.getElementById('tab');
               let newRow =document.createElement('tr');

               let no =document.createElement('td');
               let name =document.createElement('td');
               let Large =document.createElement('td');
               let Medium =document.createElement('td');
               let Small =document.createElement('td');


               no.innerHTML = i+1;
               name.innerHTML = objectData.features[i].properties.name;
               
               if(objectData.features[i].properties.num_bed >= 91){
                  Large.innerHTML = '&#10003';
               }
               else if(objectData.features[i].properties.num_bed >= 31){
                  Medium.innerHTML = '&#10003';
               }
               else{
                  Small.innerHTML = '&#10003';
               }

               newRow.appendChild(no);
               newRow.appendChild(name);
               newRow.appendChild(Large);
               newRow.appendChild(Medium);
               newRow.appendChild(Small);
               
               
               tab.appendChild(newRow);

            }
        }

        getDataFromAPI() 
    </script>

    <style>
      table,tr,td,th{
         padding:30px;
         border: 1px solid black;
         border-collapse: collapse;
         text-align: center;
      }      
      table{
         margin: 0 auto;
         width: 70%;
      }
    </style>
</head>

<body>
    <h1>โรงพยาบาลเอกชนใน กทม.</h1>

    <table id="tab">
        <tr>
         <th>No.</th>
         <th>ชื่อโรงบาล</th>
         <th>ขนาดใหญ่</th>
         <th>ขนาดกลาง</th>
         <th>ขนาดเล็ก</th>
        </tr>
    </table>
</body>

</html>