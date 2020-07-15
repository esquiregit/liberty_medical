import React, { useState } from 'react';
import clsx from 'clsx';
import List from '@material-ui/core/List';
import Drawer from '@material-ui/core/Drawer';
import Divider from '@material-ui/core/Divider';
import ListItem from '@material-ui/core/ListItem';
import ListItemIcon from '@material-ui/core/ListItemIcon';
import ListItemText from '@material-ui/core/ListItemText';
import drawerStyles from '../../../Extras/drawerStyles';
import { NavLink } from 'react-router-dom';
import { useSelector } from 'react-redux';
import { adminMenuItems, frontDeskMenuItems, labTechMenuItems } from './MenuItems';

const Sidebar     = ({ roleName }) => {
    const classes = drawerStyles();
    const visible = useSelector(state => state.sidebarReducer.visible);
    const [menuItems, setMenuItems] = useState([]);

    React.useEffect(() => {
        if(roleName && roleName.toLowerCase() === 'administrator') {
            setMenuItems(adminMenuItems);
        } else if(roleName && roleName.toLowerCase() === 'front desk') {
            setMenuItems(frontDeskMenuItems);
        } else if(roleName && roleName.toLowerCase() === 'lab technician') {
            setMenuItems(labTechMenuItems);
        }
    }, [menuItems, roleName]);
    
    return (
        <Drawer
            variant="permanent"
            classes={{
                paper: clsx({
                    [classes.drawerOpen]: visible,
                    [classes.drawerClose]: !visible,
                }),
            }}>
            <Divider />
            <List>
                {menuItems.map((menuItem) => (
                    menuItem.type
                    ?
                    <Divider key={menuItem.key} />
                    :
                    visible ?
                        <NavLink key={menuItem.label} to={menuItem.url}>
                            <ListItem button>
                                <ListItemIcon>
                                    {menuItem.icon}
                                </ListItemIcon>
                                <ListItemText primary={menuItem.label} />
                            </ListItem>
                        </NavLink>
                        :
                        <NavLink key={menuItem.label} to={menuItem.url} title={menuItem.label}>
                            <ListItem button>
                                <ListItemIcon>
                                    {menuItem.icon}
                                </ListItemIcon>
                                <ListItemText primary={menuItem.label} />
                            </ListItem>
                        </NavLink>
                ))}
            </List>
        </Drawer>
    );
}

export default Sidebar;
