/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.tests;

import freelancy.entities.Categorie;
import freelancy.entities.Test;
import freelancy.entities.Certification;
import freelancy.entities.Freelancer;
import freelancy.entities.Question;
import freelancy.services.ServiceCategorie;
import freelancy.services.ServiceCertification;
import freelancy.services.ServiceFreelancer;
import freelancy.services.ServiceQuestion;
import freelancy.services.ServiceTest;
import freelancy.utils.DataSource;
import java.sql.Time;
import static java.time.Clock.system;
/**
 *
 * @author hichem
 */
public class Freelancy {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        Time time1 = new Time(0, 30, 0);
        Test p1 = new Test("css", "test de css" );
        Categorie p2 = new Categorie("php" );
        //Certification p4 = new Certification("certif php", "une certification de php", "aaaa",10,time1,true,0,1,3,1 );
        ServiceTest st = new ServiceTest();
        ServiceCategorie sg = new ServiceCategorie();
        ServiceFreelancer sf = new ServiceFreelancer();
        //long s= st.getLastId(p1);
        //Question p3 = new Question("le ciel est-il vert?", "non", 2 ,s);
        ServiceQuestion sq = new ServiceQuestion();
        ServiceCertification sc = new ServiceCertification();
        Test t=st.getOneById(11);
        Categorie g= sg.getOneById(1);
        Freelancer f= sf.getOneById(1);
        Certification p4 = new Certification("certif php", "une certification de php", "aaaa",10,time1,true,0,g,t,f );
        
        //st.ajouter(p1);
        //st.modifier(p1);
        //sg.ajouter(p2);
        //sq.ajouter(p3);
        //System.out.println(sq.getQuestions(6));
        //sc.ajouter(p4);
        //System.out.print(st.getAll());
        //System.out.print(st.getOneById(1));
        //st.supprimer(2);
    }
    
}
