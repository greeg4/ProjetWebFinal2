<?php
class catManager extends cat {
    private $_db;
    private $_accueilArray=array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function getjeuxall($titre, $support, $realisateur) {
        try
        {
            $query="SELECT * FROM dvdcat2 where titre={$titre} and nomsupp={$support} and nomreal={$realisateur}";
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
            $query="SELECT * FROM dvdcat2 where titre={$titre} and support={$support}";
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
    
    public function getjeuxtd($titre, $realisateur) {
        try
        {
            $query="SELECT * FROM dvdcat2 where titre={$titre} and nomreal={$realisateur}";
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
    public function getjeuxcd($support, $realisateur) {
        try
        {
            $query="SELECT * FROM dvdcat2 where support={$support} and nomreal={$realisateur}";
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
            $query="SELECT * FROM dvdcat2 where titre={$titre}";
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
            $query="SELECT * FROM dvdcat2 where s.nomsupp={$support}";
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
    
    public function getjeuxd($realisateur) {
        try
        {
            $query="SELECT * FROM dvdcat2 where nomreal={$realisateur}";
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
