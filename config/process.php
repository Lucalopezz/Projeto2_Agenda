<?php 
    session_start();

    include_once("connection.php");
    include_once("url.php");

    $data = $_POST;

    if(!empty($data)){
        //cria contatos
        if($data['type'] === 'create'){
            $name = $data['name'];
            $phone = $data['phone'];
            $observations = $data['observations'];
            
            $query= "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);

            try{
                $stmt->execute();

                $_SESSION['msg'] = "Contato Criado com Sucesso!!";
        
            }catch(PDOException $e){
                //erro
                $erro = $e->getMessage();
                echo"Erro: $erro";
            }
        }
        //edita contatos
        else if($data['type'] === 'edit'){
            $name = $data['name'];
            $phone = $data['phone'];
            $observations = $data['observations'];
            $id = $data['id'];

            $query= "UPDATE contacts SET name = :name, phone = :phone, observations = :observations  WHERE id = :id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);
            $stmt->bindParam(":id", $id);
            try{
                $stmt->execute();

                $_SESSION['msg'] = "Contato Atualizado com Sucesso!!";
        
            }catch(PDOException $e){
                //erro
                $erro = $e->getMessage();
                echo"Erro: $erro";
            }

        }
        //deleta contatos
        else if($data['type'] === 'delete'){
            $id = $data['id'];

            $query= "DELETE FROM contacts WHERE id = :id";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id);
            try{
                $stmt->execute();

                $_SESSION['msg'] = "Contato Deletado com Sucesso!!";
        
            }catch(PDOException $e){
                //erro
                $erro = $e->getMessage();
                echo"Erro: $erro";
            }
        }

        header("Location:" . $BASE_URL . "../index.php"); //manda de volta pra home page

    }
    //se não tiver envio de formulário(POST), mostra o view dos contatos, ou um contato
    else{
        $id;

        if(!empty($_GET)){
            $id = $_GET['id'];
        };

        //retorna 1 contato
        if(!empty($id)){
            $query="SELECT * FROM contacts WHERE id = :id";
            $stmt = $conn->prepare($query); 
            $stmt->bindParam(":id",$id);
            $stmt->execute();

            $contact = $stmt->fetch();

        }else{
            // retorna tds os contatos
            $contacts = [];
            
            $query="SELECT * FROM contacts";

            $stmt = $conn->prepare($query); //prepara a query para ser usada

            $stmt->execute(); //executa a query 

            $contacts = $stmt->fetchAll(); //garda na variavel todos os resultados

        };

    }

    $conn = null; // encerra a conexão
?>