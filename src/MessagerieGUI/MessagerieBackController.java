/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package MessagerieGUI;

import entities.Conversation;
import entities.SessionManager;
import java.net.URL;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.ResourceBundle;
import java.util.stream.Collectors;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.ListView;
import javafx.scene.control.TextField;
import javafx.scene.input.MouseEvent;
import services.ServiceMessagerie;
import services.ServiceUser;

/**
 * FXML Controller class
 *
 * @author Firas
 */
public class MessagerieBackController implements Initializable {

    @FXML
    private ListView<String> users;
    private ListView<String> aux = new ListView();
    @FXML
    private ListView<String> conversation;
    @FXML
    private ListView<String> msg_source;
    @FXML
    private TextField search_bar;
    @FXML
    private ListView<String> listUsers;
    ServiceMessagerie sm = ServiceMessagerie.getInstance();
    SessionManager ss = SessionManager.getInstance();
    ServiceUser su = new ServiceUser();

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        su.getAll().forEach(e -> listUsers.getItems().add(e.getUserName()));
        conversation.getItems().clear();
        msg_source.getItems().clear();
        users.getItems().clear();
        aux.getItems().clear();
    }

    @FXML
    private void get_convo(MouseEvent event) throws SQLException {
        conversation.getItems().clear();
        msg_source.getItems().clear();
        String contact = users.getSelectionModel().getSelectedItem();
        ServiceMessagerie sm = new ServiceMessagerie();
        Conversation c = sm.findConvo(String.valueOf(ss.getCurrentUser().getId()), String.valueOf(su.getByUsername(contact).getId()));
        ResultSet rs = sm.getMessages(c.getId_convo());
        while(rs.next()){
            conversation.getItems().add(rs.getString("message"));
            msg_source.getItems().add(su.getOneById(rs.getInt("id_source")).getUserName());
        }
        
    }

    @FXML
    private void tryTranslate(MouseEvent event) {
    }

    @FXML
    private void search_convo(ActionEvent event) {
        users.getItems().clear();
        aux.getItems().forEach(u -> {
            users.getItems().add(u);
        });
        List<String> listUsers = users.getItems();
        if (search_bar.getText().compareTo("") != 0) {
            List<String> filteredUsers = users.getItems().stream().filter(u -> u.toUpperCase().contains(search_bar.getText().toUpperCase())).collect(Collectors.toList());
            users.getItems().clear();
            users.getItems().forEach(System.out::println);
            filteredUsers.forEach(fu -> users.getItems().add(fu));
        }
    }

    @FXML
    private void get_all_convo(MouseEvent event) {
        users.getItems().clear();
        String user = listUsers.getSelectionModel().getSelectedItem();

        ss.setCurrentUser(su.getByUsername(user));
        
        //sm.findContacts(.forEach(System.out::println);
        List<String> rs = new ArrayList();
        rs = sm.findContacts(String.valueOf(ss.getCurrentUser().getId()));
        rs.forEach(e -> users.getItems().add(e));
    }

}
