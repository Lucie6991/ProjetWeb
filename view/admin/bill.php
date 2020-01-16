<?php
//ob_end_clean();
$path= File::build_path(array('lib',"fpdf",'fpdf.php'));
require_once ($path);

class PDF extends FPDF
{

    protected $col = 0; // Colonne courante
    protected $y0;      // Ordonnée du début des colonnes
    protected $colonnes = true;

// En-tête
    function Header()
    {
        // Logo
        $logo= File::build_path(array('lib',"fpdf",'Web4SHOP.png'));
        $this->Image($logo,10,-8,50);
        // Police Arial gras 15
        $this->SetFont('Arial','B',15);
        // Décalage à droite
        $this->Cell(65);
        // Titre
        $this->Cell(60,8,'Votre facture',1,0,'C');
        // Saut de ligne
        $this->Ln(20);
    }


    function TitreChapitre($libelle)
    {
        // Arial 12
        $this->SetFont('Arial','',12);
        // Couleur de fond
        $this->SetFillColor(91,192,222);
        // Titre
        $this->Cell(0,6,"$libelle",0,1,'C',true);
        // Saut de ligne
        $this->Ln(4);
        $this->y0 = $this->GetY();
    }

    function AjouterChapitre($titre )
    {
        $this->TitreChapitre($titre);
    }

    function LoadData($file)
    {
        // Lecture des lignes du fichier
        $lines = file($file);
        $data = array();
        foreach($lines as $line){
            $data[] = explode(';',trim($line));
        }
        return $data;
    }


    function AjouterTitre($titre){
        $this->SetFont('Arial','',9);
        // Couleur de fond
        $this->SetFillColor(210,213,213);
        // Titre
        $this->Cell(80,6,"$titre",0,1,'C',true);
        // Saut de ligne
        $this->Ln(4);
        $this->y0 = $this->GetY();
    }

    function cadreTotal($r,$g,$b){
        $this->SetFont('Arial','',9);
        // Couleur de fond
        $this->SetFillColor($r,$g,$b);
        // Titre
        $this->SetX(74);
        $this->Cell(60,6,"",0,1,'C',true);
        // Saut de ligne
        $this->Ln(4);
        $this->y0 = $this->GetY();
    }

    function printInfos($data){
        $this->SetFont('Arial','',9);
        for ($i=0;$i<4;$i++) {
            if ($i==3)
                $this->Cell(80,4, ($data[0][$i])." euro");
            else
                $this->Cell(80,4, utf8_decode($data[0][$i]));
            $this->Ln();
        }
        $this->Ln();
    }

    function printAdresse($data){
        foreach($data as $row){
            $j=0;
            $this->AjouterTitre("Adresse de facturation");
            for ($i=4; $i<20; $i++) {
                if ($i>11){
                    $this->SetXY(110,28+$j);
                    if($i==12){
                        $this->AjouterTitre("Adresse de livraison");
                        $j+=6;
                        $this->SetXY(110,32+$j);
                    }
                }
                else
                    $this->SetXY(10,70+$j);
                if ($i==12)
                    $j+=4;
                $j+=4;
                $this->Cell(0, 6, utf8_decode($row[$i]), 0, 1);
            }
        }
        $this->Ln();
    }

    function printTotal($data){
        foreach($data as $row) {
            $j=20;
            $y = $this->GetY();
            $this->Line(70,$y+15,140,$y+15);
            for ($i = 20; $i < 30; $i++) {
                if ($i>24){
                    if ($i==25)
                        $j=20;
                    //$this->SetXY(120,240+$j);
                    $this->SetXY(120,$y+$j);
                }
                else{
                    if ($i==24)
                        $this->cadreTotal(91,192,222);
                    if($i==22)
                        $this->cadreTotal(210,213,213);
                    $this->SetXY(75,$y+$j);
                    //$this->SetXY(75,240+$j);
                }
                $j+=6;
                $this->Cell(0, 6, utf8_decode($row[$i]), 0, 1);
            }
        }
        $y1 = $this->GetY();
        $this->Line(70,$y+15,70,$y1+5);
        $this->Line(140,$y+15,140,$y1+5);
        $this->Line(70,$y1+5,140,$y1+5);
        $this->Ln();
    }

    function printArticles($data){
        $this->SetFont('Arial','',9);
        $j=0;
        foreach($data as $row) {
            $i=30;
            while(isset($row[$i+3])){
                if ($i == 0){
                    $this->Cell(0, 6, utf8_decode($row[$i]) ,'LR',0,'R');

                    $this->SetXY(90, 120 + $j);
                    $this->Cell(0, 6, utf8_decode($row[$i + 1]), 'LR',0,'R');
                    $this->SetXY(150, 120 + $j);
                    $this->Cell(0, 6, utf8_decode($row[$i + 2]), 'LR',0,'R');
                }
                else {
                    $this->Cell(0, 6, utf8_decode($row[$i]), 0, 1);
                    $this->SetXY(90, 120 + $j);
                    $this->Cell(0, 6, utf8_decode($row[$i + 1]), 0, 1);
                    $this->SetXY(150, 120 + $j);
                    $this->Cell(0, 6, utf8_decode($row[$i + 2]), 0, 1);
                }
                $j+=6;
                $i+=3;
            }

        }
    }


    function remerciements(){
        $this->setY($this->GetY()+10);
        $this->Cell(0,6, utf8_decode("Merci d'avoir commandé chez nous, au plaisir de vous retrouver pour de nouvelles aventures !"));
        $this->SetXY(10,$this->GetY()+10);
        $this->Cell(0,6, "La Team Web4Shop !");
    }

// Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial','I',8);
        // Numéro de page
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$header = array("Adresse de facturation :", "Adresse de livraison :");
$file= File::build_path(array('view',"admin",'files_users',$nameFile.'.txt'));
$data = $pdf->LoadData($file);
$pdf->printInfos($data);
$pdf->AjouterChapitre("RECAPITULATIF");
$pdf->printAdresse($data);
$pdf->AjouterChapitre("ARTICLES COMMANDES");
$pdf->printArticles($data);
$pdf->Line(10,126,200,126);
$pdf->Line(80,120,80,126);
$pdf->Line(140,120,140,126);
$pdf->printTotal($data);
$pdf->remerciements();
$pdf->Output();
?>
