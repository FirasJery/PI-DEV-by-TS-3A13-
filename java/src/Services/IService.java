/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Services;

import java.sql.SQLException;
import java.util.List;

/**
 *
 * @author ASUS
 */
public interface IService <T>{
    public void create(T t) throws SQLException;
    public List<T> readAll();
    public T readId(int id);
    public void update(T t);
    public void delete(int d);
}
