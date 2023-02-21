/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import entities.SessionManager;
import entities.Utilisateur;
import java.io.File;
import java.net.URL;
import java.util.List;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.ListView;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.image.ImageView;
import javafx.scene.image.Image;
import javafx.scene.input.KeyEvent;
import sevices.ServiceUser;

/**
 * FXML Controller class
 *
 * @author Firas
 */
public class MyapplicationUIController implements Initializable {

    @FXML
    private Label label_userid;
    @FXML
    private Button a;
    @FXML
    private TableView<Utilisateur> TableView;
    @FXML
    private TableColumn<Utilisateur, String> name;
    @FXML
    private TableColumn<Utilisateur, String> column2;
    @FXML
    private TableColumn<Utilisateur, String> column3;
    @FXML
    private TableColumn<Utilisateur, String> column4;
    @FXML
    private TableColumn<Utilisateur, String> column5;
    @FXML
    private TableColumn<Utilisateur, String> column6;
    @FXML
    private TableColumn<Utilisateur, String> column7;
    @FXML
    private TableColumn<Utilisateur, String> column8;
    @FXML
    private ImageView imgview;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        ServiceUser sa = new ServiceUser();

        List<Utilisateur> lu = sa.getAll();
        ObservableList<Utilisateur> userList = FXCollections.observableArrayList(lu);

        name.setCellValueFactory(new PropertyValueFactory<>("name"));
        column2.setCellValueFactory(new PropertyValueFactory<>("email"));
        column3.setCellValueFactory(new PropertyValueFactory<>("bio"));
        column4.setCellValueFactory(new PropertyValueFactory<>("education"));
        column5.setCellValueFactory(new PropertyValueFactory<>("experience"));
        column6.setCellValueFactory(new PropertyValueFactory<>("total_jobs"));
        column7.setCellValueFactory(new PropertyValueFactory<>("location"));
        column8.setCellValueFactory(new PropertyValueFactory<>(""));
        TableView.setItems(userList);

    }

    @FXML
    private void test(ActionEvent event) {
        label_userid.setText(String.valueOf(SessionManager.getInstance().getCurrentUser().getId()));

        String ip = SessionManager.getInstance().getCurrentUser().getImagePath();
        File imagef = new File(ip);
        Image image = new Image(imagef.toURI().toString());
        imgview.setImage(image);
      
            }
}
