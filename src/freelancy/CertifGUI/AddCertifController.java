/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.CertifGUI;

import entities.Certif;
import java.io.File;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.stage.FileChooser;
import services.ServiceCertif;

/**
 * FXML Controller class
 *
 * @author Ghass
 */
public class AddCertifController implements Initializable {

    @FXML
    private TextField tfnom;
    @FXML
    private TextArea tfdesc;
    @FXML
    private ImageView imagePreviw;
    @FXML
    private Label imageLabel;
private String ImagePath;
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void badge(ActionEvent event) {
         FileChooser fc = new FileChooser();
        File defaultDir = new File("src/resources");
        fc.setInitialDirectory(defaultDir);
        File SelectedFile = fc.showOpenDialog(null);
        if (SelectedFile != null) {
            
            ImagePath = "src/"+defaultDir.getName() + "/" + SelectedFile.getName();
            imageLabel.setText(ImagePath);
            imagePreviw.setImage(new Image(new File(ImagePath).toURI().toString()));
        }

    }

    @FXML
    private void ajj(ActionEvent event) {
        ServiceCertif sf = new ServiceCertif();
        Certif f = new Certif();
        f.setNom(tfnom.getText());
        f.setDesc(tfdesc.getText());
        f.setBadge(ImagePath);
        sf.ajouter(f);
    }
    
}
