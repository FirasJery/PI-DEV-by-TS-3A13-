/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package atelierjdbc;

import Entities.Personne;
import Services.ServicePersonne;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;
import java.util.Scanner;
import javafx.application.Application;
import javafx.application.Platform;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.layout.StackPane;
import javafx.stage.Stage;

/**
 *
 * @author ASUS
 */
public class fxMain extends Application {

    private Stage s;
    private static Node parent_node;

    @Override
    public void start(Stage primaryStage) throws IOException {
        //ServicePersonne sp = ServicePersonne.getInstance();
        //launchClient();
        //launchServer();

        //When you open a chat with another user, start the wait thread to read from DB
        FXMLLoader loader = new FXMLLoader(getClass().getResource("../Scene/messagerieInterface.fxml"));
        Parent root = loader.load();
        Scene scene = new Scene(root);
        primaryStage.setScene(scene);
        primaryStage.setTitle("Gestion messagerie");
        primaryStage.setOnCloseRequest(event -> {
                System.out.println("closed");
                for (Thread t : Thread.getAllStackTraces().keySet()) {
                    if (t.getName().equals("606")) {
                        t.interrupt();
                        t.stop();
                    }
                }
                //primaryStage.close();
                Platform.exit();
            });
        primaryStage.show();
        s = primaryStage;
        parent_node = root;
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        launch(args);
        Button btn = (Button) parent_node.lookup("#send_button");
        //btn.getText();
        System.out.println(btn.getText());
        for (Thread t : Thread.getAllStackTraces().keySet()) {
            if (t.getName().equals("606")) {
                t.stop();
            }
        }
    }

    /*public void launchServer() {
        try {
            // Define the command to run the Java file
            String[] command = {"java", "Server"};

            // Start the process
            ProcessBuilder builder = new ProcessBuilder(command);
            Process process = builder.start();

            // Wait for the process to finish
            int exitCode = process.waitFor();
            System.out.println("Java file exited with code " + exitCode);
        } catch (IOException | InterruptedException e) {
            e.printStackTrace();
        }
    }*/
    public void launchClient() {
        String thread_name;
        Socket clientSocket = null; // socket used by client to send and recieve data from server
        BufferedReader br = null;
        BufferedReader in = null;   // object to read data from socket
        PrintWriter out = null;     // object to write data into socket
        final Scanner sc = new Scanner(System.in); // object to read data from user's keybord

        /*ServicePersonne sp = new ServicePersonne();
        Personne p = sp.readId(606);*/
        try {
            clientSocket = new Socket("127.0.0.1", 5000);
            appReciever st = new appReciever(clientSocket);
            appSender ct = new appSender(clientSocket);
            st.setName("ClientST");
            ct.setName("ClientCT");
            st.start();
            ct.start();

        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public Thread getThreadByName(String threadName) {
        for (Thread t : Thread.getAllStackTraces().keySet()) {
            if (t.getName().equals(threadName)) {
                return t;
            }
        }
        return null;
    }

}

class appReciever extends Thread {

    PrintWriter out = null;
    Socket clientSocket = null;
    String msg;
    Scanner sc = new Scanner(System.in);

    public appReciever(Socket c) {
        this.clientSocket = c;
    }

    @Override
    public void run() {
        try {
            out = new PrintWriter(clientSocket.getOutputStream()); //in constructer
        } catch (IOException ex) {
            ex.printStackTrace();
        }
        while (true) {
            msg = sc.nextLine(); //reads data from user's keybord
            out.println(msg);    // write data stored in msg in the clientSocket
            out.flush();   // forces the sending of the data
        }
    }
}

//This class sends to client
class appSender extends Thread {

    BufferedReader in = null;
    PrintWriter out = null;
    Socket clientSocket = null;
    String msg;
    //Window open = Stage.impl_getWindows().stream().filter()

    public appSender(Socket c) {
        this.clientSocket = c;
        System.out.println("??");
    }

    @Override
    public void run() {
        try {
            out = new PrintWriter(clientSocket.getOutputStream()); //in constructer
            in = new BufferedReader(new InputStreamReader(clientSocket.getInputStream()));
            msg = in.readLine();
            //tant que le client est connecté
            while (msg != null) {
                System.out.println("Server : " + msg);

                msg = in.readLine();
            }
            System.out.println("Client déconecté");
            out.close();
            clientSocket.close();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
