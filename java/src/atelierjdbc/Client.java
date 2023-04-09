package atelierjdbc;

import Entities.Personne;
import Services.ServicePersonne;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;
import java.util.Scanner;
import javafx.stage.Stage;
import javafx.stage.Window;

public class Client {

    String name;

    public String getName() {
        return this.name;
    }

    public void setName(String n) {
        this.name = n;
    }

    public static void main(String[] args) throws IOException {
        String thread_name;
        Socket clientSocket = null; // socket used by client to send and recieve data from server
        BufferedReader br = null;
        BufferedReader in = null;   // object to read data from socket
        PrintWriter out = null;     // object to write data into socket
        final Scanner sc = new Scanner(System.in); // object to read data from user's keybord
        
        ServicePersonne sp = new ServicePersonne();
        Personne p = sp.readId(606);

        String msg;
        String response = null;

        try {
            clientSocket = new Socket("127.0.0.1", 5000);
            clientReciever st = new clientReciever(clientSocket);
            clientSender ct = new clientSender(clientSocket);
            st.setName("ClientST" + String.valueOf(p.getId()));
            ct.setName("ClientCT" + String.valueOf(p.getId()));
            st.start();
            ct.start();

        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}

class clientReciever extends Thread {

    PrintWriter out = null;
    Socket clientSocket = null;
    String msg;
    Scanner sc = new Scanner(System.in);

    public clientReciever(Socket c) {
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
class clientSender extends Thread {

    BufferedReader in = null;
    PrintWriter out = null;
    Socket clientSocket = null;
    String msg;
    //Window open = Stage.impl_getWindows().stream().filter()

    public clientSender(Socket c) {
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
