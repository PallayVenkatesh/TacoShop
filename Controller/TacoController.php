<?php

require ("Model/TacoModel.php");


class TacoController {

    function CreateTacoDropdownList() {
        $tacoModel = new TacoModel();
        $result = "<form action = '' method = 'post' width = '200px'>
                    Please select a type: 
                    <select name = 'types' >
                        <option value = '%' >All</option>
                        " . $this->CreateOptionValues($tacoModel->GetTacoTypes()) .
                "</select>
                     <input type = 'submit' value = 'Search' />
                    </form>";

        return $result;
    }

    function CreateOptionValues(array $valueArray) {
        $result = "";

        foreach ($valueArray as $value) {
            $result = $result . "<option value='$value'>$value</option>";
        }

        return $result;
    }
    
    function CreateTacoTables($types)
    {
        $tacoModel = new TacoModel();
        $tacoArray = $tacoModel->GetTacoByType($types);
        $result = "";
        
        
        foreach ($tacoArray as $key => $taco) 
        {
            $result = $result .
                    "<table class = 'tacoTable'>
                        <tr>
                            <th class = 'imgg'  rowspan='6' height = '150px' width = '150px' ><img runat = 'server' src = '$taco->image' /></th>
                            <th width = '75px' >Name: </th>
                            <td>$taco->name</td>
                        </tr>
                        
                        <tr>
                            <th>Type: </th>
                            <td>$taco->type</td>
                        </tr>
                        
                        <tr>
                            <th>Price: </th>
                            <td>$taco->price</td>
                        </tr>
                        
                        <tr>
                            <th>Roast: </th>
                            <td>$taco->roast</td>
                        </tr>
                        
                        <tr>
                            <th>Origin: </th>
                            <td>$taco->country</td>
                        </tr>
                        
                        <tr>
                            <td colspan='2' >$taco->review</td>
                        </tr>                      
                     </table>";
        }        
        return $result;
        
    }

}

?>
