#   BAREOS® - Backup Archiving REcovery Open Sourced
#
#   Copyright (C) 2017-2019 Bareos GmbH & Co. KG
#
#   This program is Free Software; you can redistribute it and/or
#   modify it under the terms of version three of the GNU Affero General Public
#   License as published by the Free Software Foundation and included
#   in the file LICENSE.
#
#   This program is distributed in the hope that it will be useful, but
#   WITHOUT ANY WARRANTY; without even the implied warranty of
#   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
#   Affero General Public License for more details.
#
#   You should have received a copy of the GNU Affero General Public License
#   along with this program; if not, write to the Free Software
#   Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
#   02110-1301, USA.

if(NOT HAVE_WIN32)

  message(STATUS "UNITDIR: " ${UNITDIR})
  message(STATUS "PLATFORM: " ${PLATFORM})

  set(CMAKE_MODULE_PATH ${CMAKE_MODULE_PATH} ${PROJECT_SOURCE_DIR}/cmake)
  if(${PLATFORM} STREQUAL ubuntu)
    add_subdirectory(debian)
  elseif(${PLATFORM} STREQUAL univention)
    message(STATUS "adding subdirectories debian and univention")
    add_subdirectory(debian)
    add_subdirectory(univention)
  elseif(${PLATFORM} STREQUAL hpux)
    message(STATUS "PLATFORM: " ${PLATFORM})
  elseif(${PLATFORM} STREQUAL archlinux)
    message(STATUS "PLATFORM: " ${PLATFORM})
  else()
    add_subdirectory(${PLATFORM})
  endif()

  if(${systemd})
    add_subdirectory(systemd)
  endif()

endif()
