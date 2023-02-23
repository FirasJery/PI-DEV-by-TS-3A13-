package atelierjdbc;


import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.Scanner;
//import src.chatThread;
//import src.senderThread;

public class Server {

    public static void main(String[] args) {
        ServerSocket serverSocket = null;
        Socket clientSocket = null;
        BufferedReader in;
        PrintWriter out;
        Scanner sc = new Scanner(System.in);

        try {
            serverSocket = new ServerSocket(5000);


        } catch (IOException e) {
            e.printStackTrace();
        }
        while (true) {
            try {
                clientSocket = serverSocket.accept();
                System.out.println("connection Established");
                recieverServer ct = new recieverServer(clientSocket);
                senderServer st = new senderServer(clientSocket);
                st.setName("ServerST");
                ct.setName("ServerCT");
                ct.start();
                st.start();

            } catch (Exception e) {
                e.printStackTrace();
                System.out.println("Connection Error");

            }
        }

    }
}

//this class recieves from server
class recieverServer extends Thread {

    PrintWriter out = null;
    Socket clientSocket = null;
    ServerSocket serverSocket = null;
    String msg;
    //Scanner sc = new Scanner(System.in);
	BufferedReader sc = null;

    public recieverServer(Socket c) {
        this.clientSocket = c;
		System.out.println("SYSTEM: Started new thread");
    }

    @Override
    public void run() {
        try {
            out = new PrintWriter(clientSocket.getOutputStream()); //in constructer
			sc = new BufferedReader(new InputStreamReader(System.in));;
        } catch (IOException ex) {
            ex.printStackTrace();
        }
		try {
			msg = sc.readLine();
            while (true) {
            out.println(msg);    // write data stored in msg in the clientSocket
            out.flush();   // forces the sending of the data
			msg = sc.readLine(); //reads data from user's keybord
        }
		//this.stop();
        } catch (IOException ex) {
            ex.printStackTrace();
        }
        
    }
}

//this class sends to server
class senderServer extends Thread {

    BufferedReader  in = null;
    PrintWriter out=null;
    Socket clientSocket=null;
    ServerSocket serverSocket = null;
    String msg;

    public senderServer(Socket c){
        this.clientSocket = c;
    }
    @Override
    public void run() {
        try {
            out = new PrintWriter(clientSocket.getOutputStream()); //in constructer
            in = new BufferedReader(new InputStreamReader(clientSocket.getInputStream()));
            msg = in.readLine();
            //tant que le client est connecté
            while (msg.compareTo("QUIT") != 0) {
                    System.out.println("Client : " + msg);

                msg = in.readLine();
            }
                System.out.println("Client déconecté");

            out.close();
			in.close();
            clientSocket.close();
			//this.stop();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}