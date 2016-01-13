<?php
class catManager extends cat {
    private $_db;
    private $_accueilArray=array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function getjeuxall($titre, $support, $nomreal) {
        try
        {
            $query="SELECT * FROM dvdcat where titre={$titre} and support={$support} and nomreal={$nomreal}";
            //select * from jeu where avec categorie...
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } 
        catch(PDOException $e){
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){     
            try
            {
                $_accueilArray[] = new cat($data);
            } 
            catch(PDOException $e)
            {
                
                print $e->getMessage();
            }            
        }
        return $_accueilArray;        
    }
    
    public function getjeuxtc($titre, $support) {
        try
        {
            $query="SELECT * FROM dvdcat where titre={$titre} and support={$support}";
            //select * from jeu where avec categorie...
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } 
        catch(PDOException $e){
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){     
            try
            {
                $_accueilArray[] = new cat($data);
            } 
            catch(PDOException $e)
            {
                
                print $e->getMessage();
            }            
        }
        return $_accueilArray;        
    }
    
    public function getjeuxtd($titre, $nomreal) {
        try
        {
            $query="SELECT * FROM dvdcat where titre={$titre} and nomreal={$nomreal}";
            //select * from jeu where avec categorie...
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } 
        catch(PDOException $e){
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){     
            try
            {
                $_accueilArray[] = new cat($data);
            } 
            catch(PDOException $e)
            {
                
                print $e->getMessage();
            }            
        }
        return $_accueilArray;        
    }
    public function getjeuxcd( $support, $nomreal) {
        try
        {
            $query="SELECT * FROM dvdcat where support={$support} and nomreal={$nomreal}";
            //select * from jeu where avec categorie...
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } 
        catch(PDOException $e){
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){     
            try
            {
                $_accueilArray[] = new cat($data);
            } 
            catch(PDOException $e)
            {
                
                print $e->getMessage();
            }            
        }
        return $_accueilArray;        
    }
    
    public function getjeuxt($titre) {
        try
        {
            $query="SELECT * FROM dvdcat where titre={$titre}";
            //select * from jeu where avec categorie...
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } 
        catch(PDOException $e){
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){     
            try
            {
                $_accueilArray[] = new cat($data);
            } 
            catch(PDOException $e)
            {
                
                print $e->getMessage();
            }            
        }
        return $_accueilArray;        
    }
    public function getjeuxc($support) {
        try
        {
            $query="SELECT * FROM dvdcat where support={$support}";
            //select * from jeu where avec categorie...
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } 
        catch(PDOException $e){
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){     
            try
            {
                $_accueilArray[] = new cat($data);
            } 
            catch(PDOException $e)
            {
                
                print $e->getMessage();
            }            
        }
        return $_accueilArray;        
    }
    
    public function getjeuxd($nomreal) {
        try
        {
            $query="SELECT * FROM dvdcat where dev={$nomreal}";
            //select * from jeu where avec categorie...
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } 
        catch(PDOException $e){
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){     
            try
            {
                $_accueilArray[] = new cat($data);
            } 
            catch(PDOException $e)
            {
                
                print $e->getMessage();
            }            
        }
        return $_accueilArray;        
    }
 }
?>
